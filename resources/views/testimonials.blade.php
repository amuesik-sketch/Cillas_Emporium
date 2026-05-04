@include('layout.header')
@include('layout.navbar')

<!-- ================= HERO START ================= -->
<div class="container-fluid hero-header mb-5" style="background-color: var(--bs-primary);">
    <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">Testimonial</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
            </ol>
        </nav>
    </div>
</div>
<!-- ================= HERO END ================= -->

<!-- ================= FEATURE START ================= -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item position-relative text-center p-3" style="background-color: var(--bs-primary);">
                    <div class="border py-5 px-3">
                        <i class="fa fa-leaf fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{ $about->first }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature-item position-relative text-center p-3" style="background-color: var(--bs-primary);">
                    <div class="border py-5 px-3">
                        <i class="fa fa-tint-slash fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{ $about->second }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature-item position-relative text-center p-3" style="background-color: var(--bs-primary);">
                    <div class="border py-5 px-3">
                        <i class="fa fa-times fa-3x text-dark mb-4"></i>
                        <h5 class="text-white mb-0">{{ $about->third }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================= FEATURE END ================= -->

<!-- ================= TESTIMONIAL START ================= -->
<div class="container-fluid testimonial my-5 py-5" style="background-color: var(--bs-primary);">
    <div class="container text-white py-5">

        <!-- Section Header -->
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3">
                {{ $review->first }}
                <span class="fw-light text-dark">{{ $review->second }}</span>
            </h1>
            <p class="mb-5">{{ $review->third }}</p>
        </div>

        <!-- Testimonial Carousel -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay="0.1s">

                    @foreach($testimonials as $testimonial)
                        <div class="testimonial-card text-center" data-dot="{{ $loop->iteration }}">
                            <div class="testimonial-avatar mx-auto mb-3" style="width:120px; height:120px;">
                                <img class="img-fluid" src="{{ asset($testimonial->picture) }}" alt="{{ $testimonial->client_name }}">
                            </div>
                            <p class="testimonial-text">"{{ $testimonial->text }}"</p>
                            <h5 class="testimonial-name mb-1">{{ $testimonial->client_name }}</h5>
                            <h6 class="testimonial-role fw-light fst-italic mb-0">{{ $testimonial->profession }}</h6>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
<!-- ================= TESTIMONIAL END ================= -->

@include('layout.footer')

<!-- ================= JS ================= -->
@push('scripts')
<script>
    $(document).ready(function(){
        $('.testimonial-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive:{
                0:{ items:1 },
                768:{ items:1 },
                992:{ items:1 }
            }
        });
    });
</script>
@endpush
