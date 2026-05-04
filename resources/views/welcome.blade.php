@include('layout.header')
@include('layout.navbar')

<!-- ================= INTRO VIDEO OVERLAY ================= -->
<div id="introOverlay">
    <video autoplay muted loop playsinline>
        <source src="{{ asset('assets/videos/product.mp4') }}" type="video/mp4">
    </video>
    <div class="video-overlay"></div>
    <div class="intro-text">
        <h1 class="welcome-text">Welcome to Cillas Emporium</h1>
        <h2 style="color: white">Pure Beauty</h2>
        <p>Discover your everyday glow</p>
    </div>
</div>

<!-- ================= HERO CAROUSEL ================= -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">

    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="4"></button>
    </div>

    <div class="carousel-inner">

        <!-- SLIDE 1: COSMETIC PRODUCT -->
        <div class="carousel-item active" style="background-image: url('{{ asset('assets/img/carousel/cosmetic.jpg') }}'); background-size: cover; background-position: center;">
            <div class="carousel-overlay"></div>
            <div class="carousel-content text-center text-lg-start">
                <h1 style="color: white">Featured Cosmetic Product</h1>
                <p>Discover the latest beauty must-have</p>
                <a href="{{ route('products') }}" class="btn btn-dark me-2">Shop Now</a>
                <a href="{{ route('contacts') }}" class="btn btn-outline-light">Book Now</a>
            </div>
        </div>

        <!-- SLIDE 2: MAKEUP -->
        <div class="carousel-item" style="background-image: url('{{ asset('assets/img/carousel/makeup.jpg') }}'); background-size: cover; background-position: center;">
            <div class="carousel-overlay"></div>
            <div class="carousel-content text-center text-lg-start">
                <h1 style="color: white">Professional Makeup</h1>
                <p>Enhance your natural beauty with expert makeup</p>
                <a href="{{ route('products') }}" class="btn btn-dark me-2">Shop Makeup</a>
                <a href="{{ route('contacts') }}" class="btn btn-outline-light">Book Now</a>
            </div>
        </div>

        <!-- SLIDE 3: NAILS -->
        <div class="carousel-item" style="background-image: url('{{ asset('assets/img/carousel/nails.jpg') }}'); background-size: cover; background-position: center;">
            <div class="carousel-overlay"></div>
            <div class="carousel-content text-center">
                <h1 style="color: white">Nails & Pedicure</h1>
                <p>Perfect nails, flawless finish</p>
                <a href="{{ route('contacts') }}" class="btn btn-dark">Book Appointment</a>
            </div>
        </div>

        <!-- SLIDE 4: LASHES -->
        <div class="carousel-item" style="background-image: url('{{ asset('assets/img/carousel/lash.jpg') }}'); background-size: cover; background-position: center;">
            <div class="carousel-overlay"></div>
            <div class="carousel-content text-center">
                <h1 style="color: white">Lash Extensions</h1>
                <p>Bold, beautiful lashes that turn heads</p>
                <a href="{{ route('contacts') }}" class="btn btn-dark">Book Now</a>
            </div>
        </div>

        <!-- SLIDE 5: BOOK NOW -->
        <div class="carousel-item" style="background-image: url('{{ asset('assets/img/carousel/beauty.jpg') }}'); background-size: cover; background-position: center;">
            <div class="carousel-overlay"></div>
            <div class="carousel-content text-center">
                <h1 style="color: white">Your Beauty, Our Passion</h1>
                <p>Makeup • Nails • Lashes • Pedicure</p>
                <a href="{{ route('contacts') }}" class="btn btn-dark btn-lg">Book Now</a>
            </div>
        </div>

    </div>

    <!-- Controls -->
   <!-- Controls -->
<button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>

</div>

<!-- ================= FEATURES STRIP ================= -->
<div class="container-fluid py-5 section-fade">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-leaf fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{ $about->first }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-tint-slash fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{ $about->second }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature-item position-relative bg-primary text-center p-3">
                    <div class="border py-5 px-3">
                        <i class="fa fa-times fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{ $about->third }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= ABOUT SECTION ================= -->
<div class="container-fluid py-5 section-fade">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid floating-product" src="{{ asset($about->picture ?? 'images/default.jpg') }}" alt="About Product">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4" style="color:#ffb6c1; ">{{ $about->fourth }} <span style="color:black;">{{ $about->fifth }}</span></h1>
                <p class="mb-4">{{ $about->sixth }}</p>
                <p class="mb-4">{{ $about->seventh }}</p>
                <a href="{{ route('products') }}" class="btn btn-primary py-2 px-4">Shop Now</a>
            </div>
        </div>
    </div>
</div>

<!-- ================= DEAL SECTION ================= -->
<div class="container-fluid deal  my-5 py-5 section-fade" style="background-color: #ffb6c1;">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid floating-product" src="{{ asset($deals->picture) }}" alt="Deal Product">
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white text-center p-4">
                    <div class="border p-4">
                        <p class="mb-2">{{ $deals->first }}</p>
                        <h2 class="fw-bold text-uppercase mb-3">{{ $deals->second }}</h2>
                        <h1 class="display-4  mb-4" style="color: #ffb6c1">${{ $deals->third }}</h1>
                        <p class="mb-4">{{ $deals->fifth }}</p>
                        <a href="{{ route('products') }}" class="btn btn-primary py-2 px-4">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
<!-- Feature Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3">
                <span class="fw-light text-dark">{{ $features->first }}</span> 
                <span  style="color: #ffb6c1">{{ $features->second }}</span>
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
                                <i class="fa fa-check fa-2x " style="color: #ffb6c1"></i>
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
                                <i class="fa fa-check fa-2x "style="color: #ffb6c1"></i>
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

  <!-- How To Use Start -->
    <div class="container-fluid how-to-use my-5 py-5" style="background-color: #ffb6c1;">
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
<!-- ================= PRODUCTS ================= -->
<div class="container-fluid py-5 section-fade">
    <div class="container">
        <div class="mx-auto text-center mb-5" style="max-width: 600px;">
            <h1 class="text-primary"><span class="fw-light text-dark">{{ $items->first }}</span> <span style="color: #ffb6c1">{{ $items->second }}</span></h1>
            <p>{{ $items->third }}</p>
        </div>
        <div class="row g-4">
            @foreach ($products as $product)
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="product-item text-center border h-100 p-4">
                    <img class="img-fluid mb-4" src="{{ asset($product->picture) }}" alt="">
                    <div class="mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <small class="fa fa-star {{ $i <= $product->rating ?  : 'text-muted' }}" style="color: #ffb6c1;"></small>
                        @endfor
                        <small>({{ $product->reviews_count }})</small>
                    </div>
                    <a href="" class="h6 d-inline-block mb-2">{{ $product->first }}</a>
                    <h5 class=" mb-3" style="color: #ffb6c1">${{ $product->second }}</h5>
                    <form action="{{ route('cart.add') }}" method="POST" class="addToCartForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-primary add-to-cart-btn" data-id="{{ $product->id }}">Add to Cart</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@include('layout.newsletter')

@include('layout.footer')
