@include('layout.header')
@include('layout.navbar')

<!-- ================= PEDICURE VIEW PAGE ================= -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden animate-fade">

                <!-- HEADER -->
                <div class="card-header bg-success text-white text-center py-4">
                    <h2 class="fw-bold mb-0">Pedicure Appointment 🦶</h2>
                    <small>Reference: {{ $pedicure->reference }}</small>
                </div>

                <!-- BODY -->
                <div class="card-body p-4 p-md-5 bg-light">
                    <div class="mb-3">
                        <strong class="text-muted">Full Name:</strong>
                        <p>{{ $pedicure->name }}</p>
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted">Phone Number:</strong>
                        <p>{{ $pedicure->phone }}</p>
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted">Pedicure Type:</strong>
                        <p>{{ $pedicure->type }}</p>
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted">Date:</strong>
                        <p>{{ \Carbon\Carbon::parse($pedicure->date)->format('F j, Y') }}</p>
                    </div>

                    <div class="mb-3">
                        <strong class="text-muted">Time:</strong>
                        <p>{{ \Carbon\Carbon::parse($pedicure->time)->format('g:i A') }}</p>
                    </div>

                    @if($pedicure->notes)
                        <div class="mb-3">
                            <strong class="text-muted">Additional Notes:</strong>
                            <p>{{ $pedicure->notes }}</p>
                        </div>
                    @endif
                </div>

                <!-- FOOTER BUTTONS -->
                <div class="card-footer bg-white text-center py-3">
                    <a href="{{ route('pedicure.edit', $pedicure->reference) }}"
                       class="btn btn-success px-4 rounded-pill me-2">
                        Edit
                    </a>

                    <form method="POST"
                          action="{{ route('pedicure.delete', $pedicure->reference) }}"
                          class="d-inline"
                          onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger px-4 rounded-pill">
                            Delete
                        </button>
                    </form>

                    <a href="{{ route('appointments.pedicure') }}"
                       class="btn btn-outline-secondary px-4 rounded-pill ms-2">
                        Back to Appointments
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- ================= STYLES ================= -->
<style>
.animate-fade {
    animation: fadeUp 0.6s ease;
}
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(25px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@include('layout.footer')
