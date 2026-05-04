@include('layout.header')
@include('layout.navbar')

<!-- ================= PEDICURE PAGE ================= -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- HERO VIDEO -->
                <div class="position-relative">
                    <div class="ratio ratio-16x9">
                        <video autoplay muted loop playsinline class="w-100 h-100">
                            <source src="{{ asset('assets/videos/vid5.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center px-3">
                        <h1 class="fw-bold display-5 text-white mb-2">🦶 Pedicure</h1>
                        <p class="lead text-white mb-0">Relax, refresh, and give your feet the care they deserve</p>
                    </div>
                </div>

                <!-- BODY -->
                <div class="card-body p-4 p-md-5 text-center bg-light">
                    <p class="fs-5 text-muted mb-4">
                        Enjoy a soothing pedicure experience designed to leave your feet soft, healthy, and beautifully polished.
                    </p>

                    <!-- PRICE LIST -->
                    <ul class="list-unstyled fs-6 mb-4">
                        <li>✨ Classic Pedicure – $20</li>
                        <li>✨ Spa & Luxury Pedicure – $35</li>
                        <li>✨ Gel Pedicure – $30</li>
                        <li>✨ Men’s Pedicure – $25</li>
                    </ul>

                    <!-- BUTTON TO OPEN MODAL -->
                    <button type="button" class="btn btn-lg px-5 rounded-pill pedicure-btn" data-bs-toggle="modal" data-bs-target="#pedicureModal">
                        Book Pedicure Appointment
                    </button>

                    <p class="text-muted small mt-3">In-studio appointments available</p>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- ================= MODAL ================= -->
<div class="modal fade" id="pedicureModal" tabindex="-1" aria-labelledby="pedicureModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title fw-bold" id="pedicureModalLabel">Book Your Pedicure</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('pedicure.appointment') }}" enctype="multipart/form-data">
          @csrf
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Full Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Phone Number</label>
              <input type="tel" name="phone" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Pedicure Type</label>
              <select name="type" class="form-select" required>
                <option selected disabled>Select pedicure</option>
                <option value="Classic Pedicure">$20 – Classic Pedicure</option>
                <option value="Spa & Luxury Pedicure">$35 – Spa & Luxury Pedicure</option>
                <option value="Gel Pedicure">$30 – Gel Pedicure</option>
                <option value="Men's Pedicure">$25 – Men’s Pedicure</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Preferred Date</label>
              <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Preferred Time</label>
              <input type="time" name="time" class="form-control" required>
            </div>
            <div class="col-12">
              <label class="form-label">Additional Notes</label>
              <textarea name="notes" class="form-control" rows="3" placeholder="Optional"></textarea>
            </div>
            <div class="col-12 text-center mt-3">
              <button type="submit" class="btn btn-success px-5 rounded-pill">Submit Booking</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ================= STYLES ================= -->
<style>
.overlay {
    background: rgba(0,0,0,0.4);
    border-radius: 0 0 0.5rem 0.5rem;
}
.pedicure-btn {
    background: linear-gradient(135deg, #198754, #28a745);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}
.pedicure-btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}
.card { animation: fadeUp 0.8s ease; }
@keyframes fadeUp { from { opacity: 0; transform: translateY(30px);} to { opacity: 1; transform: translateY(0);} }
</style>

<!-- ================= JS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
