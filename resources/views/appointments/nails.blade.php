@include('layout.header')
@include('layout.navbar')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <!-- Header -->
                <div class="bg-primary text-white text-center p-4">
                    <h2 class="mb-1">💅 Nails Appointment</h2>
                    <p class="mb-0">Book your perfect nail session with us</p>
                </div>

                <div class="card-body p-4 p-md-5">

                    @if(session('success'))
<div class="alert alert-success text-center">
    <p class="mb-2">{{ session('success') }}</p>

    <a href="{{ url()->current() }}" class="btn btn-light btn-sm">
        Book another
    </a>
</div>
@endif


                    <!-- Nail Styles Scroll -->
                    <h5 class="fw-bold mb-3">Popular Nail Styles & Prices</h5>
                    <div class="nail-scroll d-flex overflow-auto pb-3 mb-4">
                        <div class="nail-card text-center me-3">
                            <img src="{{ asset('assets/images/nails1.jpg') }}" alt="Manicure" class="img-fluid rounded mb-2">
                            <p class="mb-0">Manicure</p>
                            <p class="text-success fw-bold">$15</p>
                        </div>
                        <div class="nail-card text-center me-3">
                            <img src="{{ asset('assets/images/nails2.jpg') }}" alt="Pedicure" class="img-fluid rounded mb-2">
                            <p class="mb-0">Pedicure</p>
                            <p class="text-success fw-bold">$20</p>
                        </div>
                        <div class="nail-card text-center me-3">
                            <img src="{{ asset('assets/images/nails3.jpg') }}" alt="Gel Nails" class="img-fluid rounded mb-2">
                            <p class="mb-0">Gel Nails</p>
                            <p class="text-success fw-bold">$25</p>
                        </div>
                        <div class="nail-card text-center me-3">
                            <img src="{{ asset('assets/images/nails4.jpg') }}" alt="Acrylic Nails" class="img-fluid rounded mb-2">
                            <p class="mb-0">Acrylic</p>
                            <p class="text-success fw-bold">$30</p>
                        </div>
                        <div class="nail-card text-center me-3">
                            <img src="{{ asset('assets/images/nails5.jpg') }}" alt="French Tips" class="img-fluid rounded mb-2">
                            <p class="mb-0">French Tips</p>
                            <p class="text-success fw-bold">$20</p>
                        </div>
                    </div>

                    <!-- Appointment Form -->
                    <h5 class="fw-bold mb-3">Book Your Appointment</h5>

                    <form method="POST" 
                          action="{{ route('nails.store') }}" 
                          enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">

                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Nail Service</label>
                                <select name="service" class="form-select form-select-lg" required>
                                    <option disabled selected>Choose service</option>
                                    <option>Manicure – $15</option>
                                    <option>Pedicure – $20</option>
                                    <option>Gel Nails – $25</option>
                                    <option>Acrylic Nails – $30</option>
                                    <option>French Tips – $20</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Preferred Date</label>
                                <input type="date" name="date" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Preferred Time</label>
                                <input type="time" name="time" class="form-control form-control-lg" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Reference Style</label>
                                <input type="file" name="style_image" class="form-control form-control-lg" accept="image/*" onchange="previewImage(event)">
                                <img id="stylePreview" class="img-fluid rounded mt-2" style="display:none; max-height:150px;">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Additional Notes</label>
                                <textarea name="notes" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill">
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

<!-- ================= STYLES ================= -->
<style>
.card {
    animation: fadeUp 0.8s ease;
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.nail-scroll {
    scrollbar-width: none;
}
.nail-scroll::-webkit-scrollbar {
    display: none;
}

.nail-card {
    min-width: 140px;
    transition: transform 0.3s, box-shadow 0.3s;
}
.nail-card:hover {
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
}

.img-fluid {
    object-fit: cover;
}
</style>

<!-- ================= JS ================= -->
<script>
function previewImage(event) {
    const preview = document.getElementById('stylePreview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = 'block';
}
</script>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
