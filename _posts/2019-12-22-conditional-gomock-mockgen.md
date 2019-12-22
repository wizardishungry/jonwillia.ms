---
layout: post
title: "Speed Up GoMock With Conditional Generation"
description: "Yes, reflection mode is slow &amp; yes, source mode is not."
category: featured
tags: [Go, mocking]
---
{% include JB/setup %}

Recently I've been frustrated by the slow reflection performance of Go's [mockgen](https://github.com/golang/mock) when running `go generate ./...` on a large project. I've found it useful to use the Bourne shell built-in `test` command to conditionally generate a mock if:
- the destination is older than the source file
- the destination does not exist

`go generate` [does not implement any kind of parallelism](https://github.com/golang/go/issues/20520), so the slow performance of `mockgen`, while in source mode, has become a bit of a drag; thus –

```go
package ordering

import (
	"context"

)

//go:generate sh -c "test client_mock_test.go -nt $GOFILE && exit 0; mockgen -package $GOPACKAGE -destination client_mock_test.go github.com/whatever/project/ordering OrderClient"

type OrderClient interface {
	Create(ctx context.Context, o *OrderRequest) (*OrderResponse, error)
	Status(ctx context.Context, orderRefID string) (*OrderResponse, error)
	Cancel(ctx context.Context, orderRefID string) (*OrderResponse, error)
}
```

On my fairly large project, this reduces many generate runs from the order of 45 seconds to 2 or 3 seconds.

(The above code sample probably works in source mode, but has been contrived for simplicity.)