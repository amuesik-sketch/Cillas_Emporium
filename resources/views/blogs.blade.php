
@include('layout.header')
 
    @include('layout.navbar')
   <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Blog Articles</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Blog Articles</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->
        
    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">{{$article->first}}</span> {{$article->second}}</h1>
                <p class="mb-5">{{$article->third}}</p>
            </div>
            <div class="row g-4">
                 @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                   
                    <div class="blog-item border h-100 p-4">
                        <img class="img-fluid mb-4" src="{{ asset($blog->picture) }}" alt="">
                        <a href="" class="h5 lh-base d-inline-block">{{$blog->first}}</a>
                        <div class="d-flex text-black-50 mb-2">
                            <div class="pe-3">
                                <small class="fa fa-eye me-1"></small>
                                <small>{{$blog->views_count}}</small>
                            </div>
                            <div class="pe-3">
                                <small class="fa fa-comments me-1"></small>
                                <small>{{ $blog->comments->count() }} Comments</small>
                            </div>
                        </div>
                        <p class="mb-4">{{$blog->second}}</p>
                        <a href="" class="btn btn-outline-primary px-3">Read More</a>
                    </div>
                  
                </div>
                                    @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End -->

@include('layout.newsletter')
@include('layout.footer')