@include('layout.header')

    @include('layout.navbar')
        <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">How To Use</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">How To Use</li>
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
  <!-- How To Use Start -->
    <div class="container-fluid how-to-use bg-primary my-5 py-5">
        <div class="container text-white py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-white mb-3"><span class="fw-light text-dark">{{$usage->first}}</span> {{$usage->second}}
                    <span class="fw-light text-dark">{{$usage->third}}</span></h1>
                <p class="mb-5">{{$usage->fourth}}</p>
            </div>
            <div class="row g-5">
                @foreach ($directions as $direction)
                    
                
                <div class="col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn-square rounded-circle border mx-auto mb-4" style="width: 120px; height: 120px;">
                        <i class="fa fa-home fa-3x text-dark"></i>
                    </div>
                    <h5 class="text-white">{{$direction->first}}</h5>
                    <hr class="w-25 bg-light my-2 mx-auto">
                    <span>{{$direction->second}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- How To Use End -->
    @include('layout.footer')