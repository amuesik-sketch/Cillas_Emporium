@include('layout.header')
@include('layout.navbar')

<!-- ================= PEDICURE EDIT PAGE ================= -->
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

            <!-- ERROR MESSAGE -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden animate-fade">

                <!-- HEADER -->
                <div class="card-header bg-success text-white text-center py-4">
                    <h2 class="fw-bold mb-0">Edit Pedicure Appointment 🦶</h2>
                    <small>Reference: {{ $pedicure->reference }}</small>
                </div>

                <!-- FORM -->
                <div class="card-body p-4 p-md-5 bg-light">
                    <form method="POST"
                          action="{{ route('pedicure.update', $pedicure->reference) }}">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <!-- FULL NAME -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name', $pedicure->name) }}"
                                       required>
                            </div>

                            <!-- PHONE -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="{{ old('phone', $pedicure->phone) }}"
                                       required>
                            </div>

                            <!-- PEDICURE TYPE -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Pedicure Type</label>
                                <select name="type" class="form-select" required>
                                    <option value="Classic Pedicure"
                                        {{ $pedicure->type == 'Classic Pedicure' ? 'selected' : '' }}>
                                        Classic Pedicure – $20
                                    </option>
                                    <option value="Spa & Luxury Pedicure"
                                        {{ $pedicure->type == 'Spa & Luxury Pedicure' ? 'selected' : '' }}>
                                        Spa & Luxury Pedicure – $35
                                    </option>
                                    <option value="Gel Pedicure"
                                        {{ $pedicure->type == 'Gel Pedicure' ? 'selected' : '' }}>
                                        Gel Pedicure – $30
                                    </option>
                                    <option value="Men’s Pedicure"
                                        {{ $pedicure->type == 'Men’s Pedicure' ? 'selected' : '' }}>
                                        Men’s Pedicure – $25
                                    </option>
                                </select>
                            </div>

                            <!-- DATE -->
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Date</label>
                                <input type="date"
                                       name="date"
                                       class="form-control"
                                       value="{{ old('date', $pedicure->date) }}"
                                       required>
                            </div>

                            <!-- TIME -->
                            <div class="col-md-3">
                                <label class="form-label fw-semibold">Time</label>
                                <input type="time"
                                       name="time"
                                       class="form-control"
                                       value="{{ old('time', $pedicure->time) }}"
                                       required>
                            </div>

                            <!-- NOTES -->
                            <div class="col-12">
                                <label class="form-label fw-semibold">Additional Notes</label>
                                <textarea name="notes"
                                          class="form-control"
                                          rows="4"
                                          placeholder="Optional">{{ old('notes', $pedicure->notes) }}</textarea>
                            </div>

                            <!-- BUTTONS -->
                            <div class="col-12 text-center mt-4">
                                <button type="submit"
                                        class="btn btn-success px-5 rounded-pill me-2">
                                    Update Appointment
                                </button>

                                <a href="{{ route('pedicure.view', $pedicure->reference) }}"
                                   class="btn btn-outline-secondary px-4 rounded-pill">
                                    Cancel
                                </a>
                            </div>

                        </div>
                    </form>
                </div>

                <!-- DELETE -->
                <div class="card-footer bg-white text-center">
                    <form method="POST"
                          action="{{ route('pedicure.delete', $pedicure->reference) }}"
                          onsubmit="return confirm('Are you sure you want to delete this appointment?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger rounded-pill">
                            Delete Appointment
                        </button>
                    </form>
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
