@include('layout.header')
@include('layout.navbar')

<!-- ================= LUXURY MAKEUP APPOINTMENT PAGE ================= -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-xl-10">

            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                <!-- HERO VIDEO -->
                <div class="position-relative hero-video text-white text-center">
                    <div class="ratio ratio-16x9 rounded-top overflow-hidden">
                        <video controls autoplay muted loop class="w-100 rounded-top">
                            <source src="{{ asset('assets/videos/makeupvid1.mp4') }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center">
                        <h1 class="fw-bold mb-2 display-6">💄 Makeup Appointment</h1>
                        <p class="lead mb-0">Professional glam tailored perfectly for you</p>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">

                    {{-- ✅ SUCCESS MESSAGE --}}
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}

                            {{-- ✅ ONLY show button if reference exists --}}
                            @if(session('reference'))
                                <br>
                                <a href="{{ route('makeup.view', session('reference')) }}"
                                   class="btn btn-outline-success mt-3">
                                    View Appointment Details
                                </a>
                            @endif
                        </div>
                    @endif

                    <h5 class="fw-bold mb-4 text-center">Our Signature Looks</h5>

                    <div class="row g-3 mb-5 gallery">
                        @php
                            $makeupStyles = [
                                ['img' => 'assets/images/makeup1.jpg', 'title'=>'Natural Glam'],
                                ['img' => 'assets/images/makeup2.jpg', 'title'=>'Bridal Full Glam'],
                                ['img' => 'assets/images/makeup3.jpg', 'title'=>'Photoshoot Editorial'],
                                ['img' => 'assets/images/makeup4.jpg', 'title'=>'Evening Party Glam'],
                            ];
                        @endphp

                        @foreach($makeupStyles as $style)
                            <div class="col-md-4 col-6 text-center">
                                <img src="{{ asset($style['img']) }}"
                                     class="img-fluid rounded gallery-item"
                                     alt="{{ $style['title'] }}">
                                <p class="mt-2 fw-bold">{{ $style['title'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- ================= FORM ================= -->
                    <form method="POST" action="{{ route('makeup.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">

                            <h5 class="fw-bold">Personal Details</h5>

                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Location</label>
                                <select name="location" class="form-select form-select-lg" required>
                                    <option disabled selected>Select location</option>
                                    <option>In-studio</option>
                                    <option>Client location</option>
                                </select>
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold">Makeup Details</h5>

                            <div class="col-md-6">
                                <label class="form-label">Makeup Type</label>
                                <select name="makeup_type" class="form-select form-select-lg" required>
                                    <option disabled selected>Select makeup type</option>
                                    <option>Natural Glam</option>
                                    <option>Full Glam</option>
                                    <option>Bridal</option>
                                    <option>Editorial</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Event Type</label>
                                <input type="text" name="event_type" class="form-control form-control-lg">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Event Date</label>
                                <input type="date" name="event_date" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Event Time</label>
                                <input type="time" name="event_time" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Number of Faces</label>
                                <input type="number" name="faces" min="1" value="1" class="form-control form-control-lg">
                            </div>

                            <hr class="my-4">

                            <h5 class="fw-bold">Reference Look</h5>

                            <div class="col-12">
                                <input type="file" name="style_image" class="form-control form-control-lg" accept="image/*">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button class="btn btn-gradient btn-lg rounded-pill px-5">
                                    Book Appointment
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
.overlay { background: rgba(0,0,0,.4); }
.gallery-item { transition:.3s; }
.gallery-item:hover { transform: scale(1.05); }
.btn-gradient {
    background: linear-gradient(135deg,#6a11cb,#2575fc);
    color:#fff;
}
</style>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
