@include('layout.header')
@include('layout.navbar')

<div class="container py-5">
    <div class="card shadow-lg rounded-4 p-4">

        <h3 class="mb-4 text-center">💅 Your Nail Appointment</h3>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Name:</strong> {{ $nail->name }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $nail->phone }}</li>
            <li class="list-group-item"><strong>Service:</strong> {{ $nail->service }}</li>
            <li class="list-group-item"><strong>Date:</strong> {{ $nail->date }}</li>
            <li class="list-group-item"><strong>Time:</strong> {{ $nail->time }}</li>
            <li class="list-group-item"><strong>Notes:</strong> {{ $nail->notes ?? '—' }}</li>
        </ul>

        <div class="text-center">
            <a href="{{ route('nails.edit', $nail->reference) }}" class="btn btn-primary">
                Edit
            </a>

            <form action="{{ route('nails.delete', $nail->reference) }}"
                  method="POST"
                  class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                        onclick="return confirm('Delete this appointment?')">
                    Delete
                </button>
            </form>
            <a href="{{ route('appointments.nails') }}"
                       class="btn btn-outline-secondary px-4 rounded-pill ms-2">
                        Back to Appointments
                    </a>
        </div>
    </div>
</div>
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
