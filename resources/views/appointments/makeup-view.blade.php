@include('layout.header')
@include('layout.navbar')

<div class="container py-5">
    <div class="card shadow-lg p-4 rounded-4">
        <h4 class="fw-bold mb-4">💄 Makeup Appointment Details</h4>

@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif



        <p><strong>Name:</strong> {{ $makeup->name }}</p>
        <p><strong>Phone:</strong> {{ $makeup->phone }}</p>
        <p><strong>Email:</strong> {{ $makeup->email ?? 'N/A' }}</p>
        <p><strong>Location:</strong> {{ $makeup->location }}</p>
        <p><strong>Makeup Type:</strong> {{ $makeup->makeup_type }}</p>
        <p><strong>Event Type:</strong> {{ $makeup->event_type ?? 'N/A' }}</p>
        <p><strong>Date:</strong> {{ $makeup->event_date }}</p>
        <p><strong>Time:</strong> {{ $makeup->event_time }}</p>
        <p><strong>Number of Faces:</strong> {{ $makeup->faces }}</p>

        @if($makeup->style_image)
            <h5 class="mt-4">Reference Look:</h5>
            <div class="text-center">
                <img src="{{ asset('storage/'.$makeup->style_image) }}" 
                     class="img-fluid rounded shadow-sm mb-3" 
                     style="max-height: 300px; max-width: 100%; object-fit: contain;">
            </div>
        @endif

        @if($makeup->notes)
            <h5>Additional Notes:</h5>
            <p>{{ $makeup->notes }}</p>
        @endif

        <div class="mt-4 d-flex flex-wrap gap-2">
            <a href="{{ route('makeup.edit', $makeup->reference) }}" class="btn btn-gradient">Edit</a>

            <form method="POST" action="{{ route('makeup.delete', $makeup->reference) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this appointment?')">Delete</button>
            </form>
            <a href="{{ route('appointments.makeup') }}"
                       class="btn btn-outline-secondary px-4 rounded-pill ms-2">
                        Back to Appointments
                    </a>
        </div>
    </div>
</div>

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
</style>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
