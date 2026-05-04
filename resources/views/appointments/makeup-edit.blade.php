@include('layout.header')
@include('layout.navbar')

<div class="container py-5">
    <div class="col-xl-8 mx-auto">
        <div class="card shadow-lg p-4 rounded-4">

            <h4 class="fw-bold mb-4">💄 Edit Makeup Appointment</h4>

            <!-- Success Message -->
          @if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
        <br>
        <a href="{{ route('appointments.makeup') }}"
           class="btn btn-outline-success mt-3">
            Book Another Appointment
        </a>
    </div>
@endif


            <form method="POST" action="{{ route('makeup.update', $makeup->reference) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">

                    <!-- Personal Details -->
                    <h5 class="fw-bold">Personal Details</h5>
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name', $makeup->name) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" name="phone" class="form-control form-control-lg" value="{{ old('phone', $makeup->phone) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email', $makeup->email) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Location</label>
                        <select name="location" class="form-select form-select-lg" required>
                            <option disabled>Select service location</option>
                            <option value="In-studio" {{ old('location', $makeup->location) == 'In-studio' ? 'selected' : '' }}>In-studio</option>
                            <option value="Client location" {{ old('location', $makeup->location) == 'Client location' ? 'selected' : '' }}>Client location</option>
                        </select>
                    </div>

                    <!-- Makeup Details -->
                    <hr class="my-3">
                    <h5 class="fw-bold">Makeup Details</h5>
                    <div class="col-md-6">
                        <label class="form-label">Makeup Type</label>
                        <select name="makeup_type" class="form-select form-select-lg" required>
                            <option disabled>Choose makeup style</option>
                            <option value="Natural / Soft Glam" {{ old('makeup_type', $makeup->makeup_type) == 'Natural / Soft Glam' ? 'selected' : '' }}>Natural / Soft Glam</option>
                            <option value="Full Glam" {{ old('makeup_type', $makeup->makeup_type) == 'Full Glam' ? 'selected' : '' }}>Full Glam</option>
                            <option value="Bridal Makeup" {{ old('makeup_type', $makeup->makeup_type) == 'Bridal Makeup' ? 'selected' : '' }}>Bridal Makeup</option>
                            <option value="Engagement / Traditional" {{ old('makeup_type', $makeup->makeup_type) == 'Engagement / Traditional' ? 'selected' : '' }}>Engagement / Traditional</option>
                            <option value="Photoshoot / Editorial" {{ old('makeup_type', $makeup->makeup_type) == 'Photoshoot / Editorial' ? 'selected' : '' }}>Photoshoot / Editorial</option>
                            <option value="Evening / Party Glam" {{ old('makeup_type', $makeup->makeup_type) == 'Evening / Party Glam' ? 'selected' : '' }}>Evening / Party Glam</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Event Type</label>
                        <input type="text" name="event_type" class="form-control form-control-lg" value="{{ old('event_type', $makeup->event_type) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Event Date</label>
                        <input type="date" name="event_date" class="form-control form-control-lg" value="{{ old('event_date', $makeup->event_date) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Preferred Time</label>
                        <input type="time" name="event_time" class="form-control form-control-lg" value="{{ old('event_time', $makeup->event_time) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Number of Faces</label>
                        <input type="number" name="faces" class="form-control form-control-lg" min="1" value="{{ old('faces', $makeup->faces) }}">
                    </div>

                    <!-- Reference Image -->
                    <hr class="my-3">
                    <h5 class="fw-bold">Reference / Special Requests</h5>
                    <div class="col-12">
                        <label class="form-label">Upload Reference Look</label>
                        <input type="file" name="style_image" id="styleImageInput" class="form-control form-control-lg" accept="image/*">
                        <div class="mt-3 text-center">
                            @if($makeup->style_image)
                                <img id="stylePreview" src="{{ asset('storage/'.$makeup->style_image) }}" class="img-fluid rounded shadow-sm" style="max-height:220px;">
                            @else
                                <img id="stylePreview" class="img-fluid rounded shadow-sm d-none" style="max-height:220px;">
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Additional Notes</label>
                        <textarea name="notes" class="form-control" rows="4">{{ old('notes', $makeup->notes) }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div class="col-12 d-flex justify-content-center mt-4">
                        <button type="submit" class="btn btn-gradient btn-lg rounded-pill px-5 me-3">Update Appointment</button>
                        <a href="{{ route('makeup.view', $makeup->reference) }}" class="btn btn-outline-secondary btn-lg rounded-pill px-5">Cancel</a>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- JS for image preview -->
<script>
document.getElementById('styleImageInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById('stylePreview');

    if (!file) return;

    preview.src = URL.createObjectURL(file);
    preview.classList.remove('d-none');
});
</script>

<style>
.btn-gradient {
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff;
    border: none;
    transition: all 0.3s ease;
}
.btn-gradient:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}
.alert-success {
    transition: opacity 0.5s ease-in-out;
}
</style>
