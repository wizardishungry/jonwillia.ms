---
layout: post
title: "Forcing Clang to statically link against an installed library"
category: programming
tags: [llvm, gcc, c++, c, clang]
---
{% include JB/setup %}

When building [redistributable binary plugins]({% post_url 2018-01-22-rtl_sdr-vcvrack %}),
we cannot rely on the end user having installed library dependencies.
In my case, I need my code to be statically linked against libusb and librtlsdr.

In the past, the venerable [GCC](https://gcc.gnu.org) allowed us to specify static linking by specifying a switch
such as `-l:rtlsdr` and dynamic linking with `-lrtlsdr`. The modern [LLVM](http://llvm.org) Clang compiler
is now the C/C++ compiler of choice on many platforms including in Apple's Xcode.
Its linker lacks an option to force static linking when resolving a library passed in.
When both a static and dynamic version of a library exist, we must explicitly pass the path to the static library if we wish to link statically with Clang.

##### Static linking with full paths
```bash
c++ -o plugin.dylib object.cpp.o … /usr/local/Cellar/libusb/1.0.21/lib/libusb-1.0.a /usr/local/Cellar/librtlsdr/0.5.3/lib/librtlsdr.a
```
##### Dynamic linking (no full paths needed)
```bash
c++ -o plugin.dylib object.cpp.o … -lusb-1.0 -lrtlsdr -lusb-1.0
```

Getting your build system (e.g. `make`) to determine the exact path to a static version of a library can be trying.
Fortunately many modern packages include [pkg-config](https://www.freedesktop.org/wiki/Software/pkg-config/)
which will let you do things such as the following in your Makefile
```make
PKGCONFIG= pkg-config
PACKAGES= libusb-1.0 librtlsdr

# FLAGS will be passed to both the C and C++ compiler

FLAGS += $(shell $(PKGCONFIG) --cflags $(PACKAGES))
```
The compiler will get the flags
`-I/usr/local/Cellar/librtlsdr/0.5.3/include/ -I/usr/local/Cellar/libusb/1.0.21/include/libusb-1.0`
to set the include path. pkg-config also can be used to set linker flags with `--libs`; however,
in my experience the `--static` option does not correctly emit static linking options.
My trick for getting make to emit the correct static linking options is:
```make
LDFLAGS +=$(shell $(PKGCONFIG) --variable=libdir libusb-1.0)/libusb-1.0.a
LDFLAGS +=$(shell $(PKGCONFIG) --variable=libdir librtlsdr)/librtlsdr.a
```

I've had varying success with this technique, [particularly running into problems on Linux](https://github.com/WIZARDISHUNGRY/vcvrack-rtlsdr/issues/26),
but it works on Windows (with some conditional code for library naming) and Mac.

If a library lacks pkg-config, I'd consider using the output of `ld -v` to enumerate search paths for `find`.

##### Validating Static Linking

| Windows            | Linux         | Mac                   |
|--------------------|---------------|-----------------------|
| [`objdump file.dll`](https://stackoverflow.com/questions/1993673/what-is-the-equivalent-of-linuxs-ldd-on-windows) | `ldd file.so` | `otool -L file.dylib` |
