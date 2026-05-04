@include('layout.header')
@include('layout.navbar')

<!-- ================= LASH EXTENSION PAGE ================= -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
 <!-- Success message -->
                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- HERO VIDEO -->
                <div class="position-relative">
                    <div class="ratio ratio-16x9">
                        <video autoplay muted loop playsinline class="w-100 h-100">
                            <source src="{{ asset('assets/videos/vid3.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center px-3">
                        <h1 class="fw-bold display-5 text-white mb-2">👁️ Lash Extension</h1>
                        <p class="lead text-white mb-0">Enhance your eyes with flawless, long-lasting lashes</p>
                    </div>
                </div>

                <!-- BODY -->
                <div class="card-body p-4 p-md-5 text-center bg-light">

                    

                    <p class="fs-5 text-muted mb-4">
                        From natural classics to bold volume lashes, our professionals
                        give you the perfect look for any occasion.
                    </p>

                    <!-- PRICE LIST -->
                    <ul class="list-unstyled fs-6 mb-4">
                        <li>✨ Classic Lashes – $30</li>
                        <li>✨ Hybrid Lashes – $40</li>
                        <li>✨ Volume Lashes – $50</li>
                        <li>✨ Mega Volume – $60</li>
                        <li>✨ Custom Styling – $70</li>
                    </ul>

                    <!-- BUTTON TO OPEN MODAL -->
                    <button type="button" class="btn btn-lg px-5 rounded-pill lash-btn" data-bs-toggle="modal" data-bs-target="#lashModal">
                        Book Lash Appointment
                    </button>

                    <p class="text-muted small mt-3">In-studio appointments available</p>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- ================= MODAL ================= -->
<div class="modal fade" id="lashModal" tabindex="-1" aria-labelledby="lashModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4 shadow-lg">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title fw-bold" id="lashModalLabel">Book Your Lash Appointment</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('lash.appointment') }}" enctype="multipart/form-data">
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
              <label class="form-label">Lash Type</label>
              <select name="lash_type" class="form-select" required>
                <option selected disabled>Select lash type</option>
                <option>Classic Lashes</option>
                <option>Hybrid Lashes</option>
                <option>Volume Lashes</option>
                <option>Mega Volume</option>
                <option>Custom Styling</option>
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
            <div class="col-md-6">
              <label class="form-label">Reference Image</label>
              <input type="file" name="style_image" class="form-control" accept="image/*" onchange="previewImage(event)">
              <img id="stylePreview" src="#" alt="Style Preview" class="img-fluid rounded mt-2" style="display:none; max-height:150px;">
            </div>
            <div class="col-12">
              <label class="form-label">Additional Notes</label>
              <textarea name="notes" class="form-control" rows="3" placeholder="Optional"></textarea>
            </div>
            <div class="col-12 text-center mt-3">
              <button type="submit" class="btn btn-dark px-5 rounded-pill">Submit Booking</button>
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
.lash-btn {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}
.lash-btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}
.card { animation: fadeUp 0.8s ease; }
@keyframes fadeUp { from { opacity: 0; transform: translateY(30px);} to { opacity: 1; transform: translateY(0);} }
</style>

<!-- ================= JS ================= -->
<script>
function previewImage(event){
    const preview = document.getElementById('stylePreview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.style.display = 'block';
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
