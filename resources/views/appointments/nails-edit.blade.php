@include('layout.header')
@include('layout.navbar')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="bg-primary text-white text-center p-4 rounded-top">
                    <h2>✏️ Edit Nail Appointment</h2>
                    <p class="mb-0">Update or delete your booking</p>
                </div>

                <div class="card-body p-4">

                    {{-- UPDATE FORM --}}
                    <form method="POST"
                          action="{{ route('nails.update', $nail->reference) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name"
                                       class="form-control"
                                       value="{{ $nail->name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone"
                                       class="form-control"
                                       value="{{ $nail->phone }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Service</label>
                                <input type="text" name="service"
                                       class="form-control"
                                       value="{{ $nail->service }}" required>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Date</label>
                                <input type="date" name="date"
                                       class="form-control"
                                       value="{{ $nail->date }}" required>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label">Time</label>
                                <input type="time" name="time"
                                       class="form-control"
                                       value="{{ $nail->time }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes"
                                          class="form-control"
                                          rows="3">{{ $nail->notes }}</textarea>
                            </div>

                            @if($nail->style_image)
                                <div class="col-12">
                                    <label class="form-label">Current Style</label><br>
                                    <img src="{{ asset('storage/'.$nail->style_image) }}"
                                         class="img-fluid rounded"
                                         style="max-height:150px;">
                                </div>
                            @endif

                            <div class="col-12">
                                <label class="form-label">Change Style Image</label>
                                <input type="file" name="style_image"
                                       class="form-control">
                            </div>

                            <div class="col-12 d-flex justify-content-between mt-4">
                                <button class="btn btn-success px-4">
                                    💾 Update Appointment
                                </button>
                            </form>

                            {{-- DELETE FORM --}}
                            <form method="POST"
                                  action="{{ route('nails.delete', $nail->reference) }}"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger px-4">
                                    🗑 Delete
                                </button>
                            </form>
                        </div>

                </div>
            </div>

        </div>
    </div>
</div>
