@include('layout.header')


    @include('layout.navbar')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Features</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Features</li>
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
<!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3">
                <span class="fw-light text-dark">{{ $features->first }}</span> 
                {{ $features->second }}
            </h1>
            <p class="mb-5">{{ $features->third }}</p>
        </div>

        <div class="row g-4 align-items-center">

            <!-- LEFT benefits -->
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="row g-5">
                    @foreach ($benefits->slice(0, 3) as $benefit)
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $benefit->first }}</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>{{ $benefit->second }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CENTER IMAGE -->
            <div class="col-lg-4 wow fadeIn text-center" data-wow-delay="0.1s">
                <img class="img-fluid animated pulse infinite" 
                     src="{{ asset($features->picture) }}" 
                     style="max-height: 450px;">
            </div>

            <!-- RIGHT benefits -->
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="row g-5">
                    @foreach ($benefits->slice(3) as $benefit)
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-check fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>{{ $benefit->first }}</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>{{ $benefit->second }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Feature End -->
@include('layout.newsletter')
@include('layout.footer')