@include('layout.header')


    @include('layout.navbar')
    <!-- Hero Start -->
    <div class="container-fluid hero-header mb-5" style="background-color: #ffb6c1;">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-leaf fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{$about->first}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-tint-slash fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{$about->second}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-times fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{$about->third}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Feature End -->
<!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="{{ asset($about->picture ?? 'images/default.jpg') }}">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class=" mb-4" style="color: #ffb6c1">{{$about->fourth}} <span class="fw-light text-dark">{{$about->fifth}}</span></h1>
                    <p class="mb-4">{{ $about->sixth }}</p>
                    <p class="mb-4">{{$about->seventh}}</p>
                    <a class="btn btn-primary py-2 px-4" href="">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    @include('layout.newsletter')
    @include('layout.footer')