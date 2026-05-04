<!-- ================= FOOTER ================= -->
<div class="container-fluid footer section-fade">
    <div class="container py-5">
        <div class="row g-4 align-items-start">

            <!-- BRAND INFO -->
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-start">
                <h2 class="feminine-font mb-3">
                    <span class="brand-logo-footer">Cilla's</span> 
                    <span class="brand-text-footer">Emporium</span>
                </h2>
                <p class="mb-3">
                    Discover premium beauty products crafted to enhance your
                    natural glow. Clean ingredients. Elegant results.
                </p>

                <div class="d-flex">
                    <a class="btn btn-square btn-outline-footer me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-footer me-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-square btn-outline-footer me-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-footer" href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>

            <!-- QUICK LINKS -->
<div class="col-lg-2 col-md-6 d-flex flex-column">
    <h5 class="footer-title mb-3" >Quick Links</h5>
    <div class="d-flex flex-column">
        <a class="btn btn-link-footer" href="{{ route('index') }}">Home</a>
        <a class="btn btn-link-footer" href="{{ route('about') }}">About Us</a>
        <a class="btn btn-link-footer" href="{{ route('products') }}">Products</a>
        <a class="btn btn-link-footer" href="{{ route('contacts') }}">Contact</a>
    </div>
</div>

<!-- SUPPORT -->
<div class="col-lg-3 col-md-6 d-flex flex-column">
    <h5 class="footer-title mb-3">Support</h5>
    <div class="d-flex flex-column">
        <a class="btn btn-link-footer" href="#">Shipping Info</a>
        <a class="btn btn-link-footer" href="#">Returns & Refunds</a>
        <a class="btn btn-link-footer" href="#">Privacy Policy</a>
        <a class="btn btn-link-footer" href="#">Terms & Conditions</a>
    </div>
</div>

            <!-- NEWSLETTER -->
            <div class="col-lg-3 col-md-6 d-flex flex-column">
                <h5 class="footer-title mb-3">Newsletter</h5>
                <p>Subscribe for beauty tips & exclusive deals</p>
                <form action="#" method="post" class="w-100">
                    @csrf
                    <div class="position-relative w-100">
                        <input type="email"
                               class="form-control-footer w-100 py-3 ps-4 pe-5"
                               placeholder="Your email"
                               required>
                        <button type="submit" class="btn btn-submit-footer position-absolute top-0 end-0 mt-2 me-2">
                            Join
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- COPYRIGHT -->
    <div class="container-fluid border-top-footer py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                    &copy; {{ date('Y') }} <strong>Cilla's Emporium</strong>. All Rights Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed with ❤️ for beauty lovers
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================= INTRO & SCROLL ANIMATIONS ================= -->
<script>
document.addEventListener('DOMContentLoaded', () => {

    // Intro overlay auto hide
    const overlay = document.getElementById('introOverlay');
    if (overlay) {
        setTimeout(() => {
            overlay.classList.add('hide');
        }, 4000);
    }

    // Section fade-in
    const sections = document.querySelectorAll('.section-fade');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, { threshold: 0.2 });

    sections.forEach(section => observer.observe(section));
});
</script>
<script>
document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
    btn.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent any normal submit

        fetch("{{ route('cart.add') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ product_id: this.dataset.id })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // 🔹 Update cart badge silently
                document.getElementById('cart-count').innerText = data.cart_count;
            }
        });
    });
});
</script>
<script>
    const intro = document.getElementById('introOverlay');
    const video = intro.querySelector('video');

    // Hide overlay after 5 seconds OR when user clicks
    setTimeout(() => {
        intro.classList.add('hide');
    }, 5000);

    intro.addEventListener('click', () => {
        intro.classList.add('hide');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const heroCarousel = document.querySelector('#heroCarousel');
    if (heroCarousel) {
        new bootstrap.Carousel(heroCarousel, {
            interval: 5000,
            ride: 'carousel',
            pause: false,
            wrap: true
        });
    }
</script>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script>
    if (window.innerWidth < 992) {
        document.querySelectorAll('.appointment-link').forEach(link => {
            link.setAttribute('data-bs-toggle', 'dropdown');
        });
    }
</script>
<!-- jQuery (REQUIRED for Owl Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script>
$(document).ready(function () {
    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoplayTimeout: 4000,
        smartSpeed: 1000,
        dots: true,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            992: {
                items: 2
            }
        }
    });
});
</script>
