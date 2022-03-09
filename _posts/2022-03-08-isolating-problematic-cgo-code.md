---
layout: post
title: "Isolating problematic Cgo code"
description: "Using dedicated worker processes & passing file descriptors over sockets."
category: # featured
tags: [Go, Unix, Video]
---
{% include JB/setup %}

<span class="marginnote">
![Typical image](/assets/images/2022-03-08-isolating-problematic-cgo-code/FNFL-4ZWYAEpIoF.png)
</span>
## Introduction
[My twitter bot]({% post_url 2022-03-08-introducing-kctv_bot %}) watches an 
[HLS](https://en.wikipedia.org/wiki/HTTP_Live_Streaming) video stream and posts
screengrabs to Twitter. Because the video source is not regularly available,
some image processing must be performed to recognize when the channel is live.

Although the code is written in [Go](https://go.dev/),
the native options for decoding segments of video to get at individual frames
are underwhelming. Fortunately, there exist [Cgo](https://pkg.go.dev/cmd/cgo)
<label for="sn-goav" class="margin-toggle sidenote-number">wrappers</label><input id="sn-goav" class="margin-toggle" type="checkbox"><span class="sidenote">[charlestamz/goav](https://github.com/charlestamz/goav)</span> for the popular audio/video library [ffmpeg](https://ffmpeg.org/).

The process of decoding an MPEG video segment to iterate over each individual
video frame is a bit involved<label for="sn-decode" class="margin-toggle sidenote-number"></label>.
<input id="sn-decode" class="margin-toggle" type="checkbox">
<span class="sidenote">
To get an idea of the complexity, begin reading [`HandleSegment`](https://github.com/WIZARDISHUNGRY/hls-await/blob/blog-post/internal/segment/goav.go#106) at the call to `AvformatAllocContext()`.
</span>
Although the program was stable over short time intervals, it frequently
crashed while running unsupervised. Furthermore, I would often
return to my computer to see that the memory usage had ballooned
to many <label for="sn-gigabytes" class="margin-toggle sidenote-number">gigabytes</label>.
<input id="sn-gigabytes" class="margin-toggle" type="checkbox">
<span class="sidenote">
Typical memory usage is around a gigabyte, with roughly half of that being
accounted for by memory allocated inside Go — as reported by
[`ReadMemStats()`](https://pkg.go.dev/runtime#ReadMemStats).
</span>
After a few attempts at [tracing memory leaks](https://kirshatrov.com/posts/finding-memory-leak-in-cgo/)
in Cgo proved mostly fruitless, I decided to try separating the program into two processes.

### What is HLS (Http Live Streaming)?

Briefly, [HLS](https://en.wikipedia.org/wiki/HTTP_Live_Streaming) is a popular format for streaming content.
A piece of content, be it live or on demand, is represented as a series of short (~10 second) media files
contained in a playlist. A live playlist will be repeatedly fetched by a player to discover the availability
of new media segments.

## Architecture
<span class="marginnote">
![Color bars w/ station id](/assets/images/2022-03-08-isolating-problematic-cgo-code/FM4Au54X0A0E9FX.png)
![Test pattern](/assets/images/2022-03-08-isolating-problematic-cgo-code/FM5uoddXsAAMnHf.png)
</span>
* Parent process, directly invoked from the command line to handle the majority of the tasks:
  * Downloading the playlist to check for new segments.
*Every [Target Duration](https://datatracker.ietf.org/doc/html/draft-pantos-hls-rfc8216bis-07#section-4.4.3.1)
download the playlist and look for new segments*
  * Fetching segments
  * Image pattern recognition *Is this an image of color bars or a test pattern?
Is it a black screen? Is the image moving?* 
  * Maintenance of a state machine *Has the image been mostly moving for the last 30 seconds?
If so, begin storing images to post.*
  * Posting tweets.
* Child process, invoked by the parent process.
  * An rpc service that, when provided with a raw segment (a bunch of MPEG bytes),
returns a slice of frames (`[]image.Image`) to the caller.
  * The child process is completely stateless — there is no dependency on previous rpc calls; a freshly restarted
  instance of the child process is ready to serve requests.

## Implementation

Some of the code below is edited for clarity.

### Starting the child process

Spawning the child process is handled by `spawnChild` within [`internal/worker/parent.go`](https://github.com/WIZARDISHUNGRY/hls-await/blob/blog-post/internal/worker/parent.go#L82).

First, a special flag is appended to a slice of arguments to the child process<label for="sn-fuzz" class="margin-toggle sidenote-number"></label>.
<input id="sn-fuzz" class="margin-toggle" type="checkbox">
<span class="sidenote">
The go1.18+ fuzzing system is [very similar](https://jayconrod.com/posts/123/internals-of-go-s-new-fuzzing-system) to our approach.
</span>
```go
args := append([]string{}, os.Args[1:]...)
args = append(args, "-worker")
```

Next the parent process listens on a [Unix domain socket](https://en.wikipedia.org/wiki/Unix_domain_socket)<label for="sn-fuzz" class="margin-toggle sidenote-number"></label>.
<input id="sn-fuzz" class="margin-toggle" type="checkbox">
<span class="sidenote">
It may be surprising to see an empty `UnixAddr` passed into `ListenUnix` instead of a path to a file.
This is a Linuxism that allows us to [use a Unix socket on a read-only
file system](https://www.toptip.ca/2013/01/unix-domain-socket-with-abstract-socket.html). 
</span>
```go
ul, err := net.ListenUnix("unix", &net.UnixAddr{})
if err != nil {
    return err
}
```

Next retrieve an `os.File` corresponding to this socket. This struct contains the file descriptor of the socket.
``` go
f, err := ul.File()
if err != nil {
    return err
}
```

We prepare the child process for execution and add our socket to `ExtraFiles` slice on the `exec.Cmd` struct:
```go
cmd := exec.CommandContext(ctx, os.Args[0], args...)
cmd.ExtraFiles = append(cmd.ExtraFiles, f)
```

Passing the listening socket's FD via `ExtraFiles` allows the child process to `Accept()` connections<label for="sn-pass-fd" class="margin-toggle sidenote-number"></label>.
<input id="sn-pass-fd" class="margin-toggle" type="checkbox">
<span class="sidenote">
While it is possible for the child process to call `ListenUnix` directly and avoid passing `ExtraFiles`, the parent's `DialUnix` call may occur
before the child process has begun listening.
</span>

The parent process next dials two<label for="sn-two" class="margin-toggle sidenote-number"></label> connections
and creates an [net/rpc](https://pkg.go.dev/net/rpc) client. 
<input id="sn-two" class="margin-toggle" type="checkbox">
<span class="sidenote">
The short answer is that one is for passing requests and the other is for passing newly opened file descriptors.
See [*Why two client connections?*](#why-two-client-connections) below.
</span>

```go
connRPC, err := net.DialUnix("unix", nil, ul.Addr().(*net.UnixAddr))
if err != nil {
    return err
}
p.conn = conn

connFD, err := net.DialUnix("unix", nil, ul.Addr().(*net.UnixAddr))
if err != nil {
    return err
}

client := rpc.NewClient(connRPC)
```

### Child startup

The child process next translates the file descriptor passed via `ExtraFiles` back into a `Listener`.
The first 3 file descriptors are reversed for standard i/o , so `ExtraFiles[0]` corresponds to an FD of 3.

Simplified from [`internal/worker/child.go`](https://github.com/WIZARDISHUNGRY/hls-await/blob/blog-post/internal/worker/child.go):
```go
f := os.NewFile(3, "unix")
if f == nil {
    return fmt.Errorf("nil for fd %d", fd)
}
listener, err := net.FileListener(f)
if err != nil {
    return fmt.Errorf("net.FileListener: %w", err)
}
```

The `Accept` loop for the child process is contained in `runWorker` ([`internal/worker/child.go`](https://github.com/WIZARDISHUNGRY/hls-await/blob/blog-post/internal/worker/child.go#L152)).

```go
server := rpc.NewServer()

err := server.Register(segApi) // pointer to a struct holding the goav code
if err != nil {
    log.WithError(err).Fatal("server.Register")
}

conn, err := listener.Accept()
if err != nil {
    return errors.Wrap(err, "listener.Accept")
}
server.ServeConn(conn)
```

The child has now attached an RPC server to the Unix socket connection from the parent.
`segApi`'s methods<label for="sn-methods" class="margin-toggle sidenote-number"></label> may now be invoked from the parent process.
<input id="sn-methods" class="margin-toggle" type="checkbox">
<span class="sidenote">
Specifically [`HandleSegment`](https://github.com/WIZARDISHUNGRY/hls-await/blob/blog-post/internal/segment/goav.go#106)
</span>

### Making calls to the child process

Again, the [net/rpc](https://pkg.go.dev/net/rpc) documentation may be helpful.
The parent process is able to make calls to child as such:
```go
return client.Call("GoAV.HandleSegment", request, resp)
```

`request` and `response` are pointers to:
```go
type Request struct {
	FD uintptr
}
type Response struct {
	RawImages []image.Image
}
```

### Why are you passing file descriptors from process to process?

`Request` contains an integer file descriptor for each segment.
I explored passing the segment to `goav` in a number of ways.
1. A path to a temporary file.
    * This had the disadvantage of disk i/o, and could leave files around when the program crashed.
    * `goav` would not wait for the rest of the data to download once the end of a partially downloaded file was reached.
2. A path to a temporary [FIFO](https://en.wikipedia.org/wiki/Named_pipe).
    * Same problems as temporary files and a bit complex.
3. Passing http `Body()` - an instance of the [`io.ReadCloser`](https://pkg.go.dev/io#ReadCloser) interface.
    * It wasn't obvious to me how to call `goav` on data already in memory.
    * This does not work across process boundaries.
4. The serialized byte slice of the entire segment (~10 mb for our stream).
    * `goav` cannot begin decoding the segment until it has been fully read from the http response.
    * It wasn't obvious to me how to call `goav` on data already in memory.
    * When moving to process separation, this added additional copies
        1. Copy from `Body` to a `[]byte`
        2. Serialize each `Request` using `encoding/gob`.
        3. Unserialize the `Request` using `encoding/gob`.

I ended up passing per-request file descriptors to the child process before each RPC call.
Much of the previous code was simplified to hide this complexity, but the implementation of sending
and receiving file descriptors can be found in 
[`pkg/unixmsg/send_fd.go`](https://github.com/WIZARDISHUNGRY/hls-await/blob/blog-post/pkg/unixmsg/send_fd.go).

```go
func SendFd(conn *net.UnixConn, fd uintptr) error {
	rights := syscall.UnixRights(int(fd))
	dummy := []byte("x")
	n, oobn, err := conn.WriteMsgUnix(dummy, rights, nil)
	if err != nil {
		return fmt.Errorf("err %v", err)
	}
	if n != len(dummy) {
		return fmt.Errorf("short write %v", conn)
	}
	if oobn != len(rights) {
		return fmt.Errorf("short oob write %v", conn)
	}
	return nil
}

func RecvFd(conn *net.UnixConn) (uintptr, error) {
	buf := make([]byte, 32)
	oob := make([]byte, 32)
	_, oobn, _, _, err := conn.ReadMsgUnix(buf, oob)
	if err != nil {
		return 0, err
	}
	scms, err := syscall.ParseSocketControlMessage(oob[:oobn])
	if err != nil {
		return 0, fmt.Errorf("ParseSocketControlMessage %w", err)
	}
	if len(scms) != 1 {
		return 0, fmt.Errorf("SocketControlMessage count not 1: %v", len(scms))
	}
	scm := scms[0]
	fds, err := syscall.ParseUnixRights(&scm)
	if err != nil {
		return 0, fmt.Errorf("ParseUnixRights: %w", err)
	}
	if len(fds) != 1 {
		return 0, fmt.Errorf("fd count not 1: %v", len(fds))
	}
	return uintptr(fds[0]), nil
}
```

The file descriptor passed to the child process corresponds to a
`PipeReader` returned from [io.Pipe()](https://pkg.go.dev/io#Pipe).
The HTTP body is streamed to the `PipeWriter` as it downloads; enabling the `goav` calls to begin decoding without
waiting for the entire response to be read into memory.

Simplified version of handling a segment body from
[`internal/stream/seg_consumer.go`](https://github.com/WIZARDISHUNGRY/hls-await/blob/blog-post/internal/stream/seg_consumer.go#L84):

```go
resp, err := s.httpGet(ctx, url)
if err != nil {
    return errors.Wrap(err, "httpGet")
}
defer resp.Body.Close()

r, w, err := os.Pipe()
if err != nil {
    return errors.Wrap(err, "os.Pipe")
}
defer r.Close()
defer w.Close()

go func() {
    if _, err := io.Copy(w, resp.Body); err != nil {
        log.WithError(err).Warn("io.Copy")
    }
    w.Close()
}()

request := &segment.Request{FD: r.Fd()}
return s.ProcessSegment(ctx, request)

```

In the child process, the ffmpeg calls are passed a filename that corresponds to an open file descriptor returned by `RecvFd`.
```go
file := fmt.Sprintf("/proc/self/fd/%d", fd) // This is a Linuxism
pFormatContext := avformat.AvformatAllocContext()
avformat.AvformatOpenInput(&pFormatContext, file, nil, nil)
```

### Why two client connections?

Socket control messages are considered out-of-band (OOB) data and are read into
a separate slice by [`ReadMsgUnix`](https://pkg.go.dev/net#UnixConn.ReadMsgUnix).
Attempting to read available OOB data will always discard at least
1 byte of in-band data<label for="sn-oob" class="margin-toggle sidenote-number"></label>.
It may be possible to make an abstraction on top of `UnixConn` that allows multiplexing both messages from both streams.
But for a project this frivolous, this is good enough for now. 
<input id="sn-oob" class="margin-toggle" type="checkbox">
<span class="sidenote">
See [proposal: net: add ability to read OOB data without discarding a byte](https://github.com/golang/go/issues/32465) for more detail.
</span>

## Conclusion

This code definitely has plenty of warts resulting from its origin as an ANSI art HLS player.
Nevertheless, I'm pleased that this is now able to run fairly stable without constant
care and feeding. I plan on moving this into my local Kubernetes cluster and expect plenty of new problems
from the much more limited resources.

- Source: [`WIZARDISHUNGRY/hls-await`](https://github.com/WIZARDISHUNGRY/hls-await)
- Twitter: [@KCTV_bot](https://twitter.com/KCTV_bot)