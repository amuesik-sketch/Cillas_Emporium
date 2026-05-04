@include('layout.header')
@include('layout.navbar')
<body>

<!-- ================= CHECKOUT ================= -->
<div class="container py-5">

  <div class="row g-5">

    <!-- BILLING DETAILS -->
    <div class="col-md-7 col-lg-8">
      <div class="checkout-card animate__animated animate__fadeInLeft shadow-lg rounded-4 p-4 bg-white">

        @if(session('success'))
          <div class="alert alert-success text-center">
              {{ session('success') }}
          </div>
        @endif

        <h4 class="checkout-title mb-4">Billing Details</h4>

        <form action="{{ route('billings.store') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-sm-6">
              <label class="form-label fw-semibold" for="first_name">First name</label>
              <input type="text" class="form-control form-control-pink" id="first_name"  name="first_name" required>
            </div>
            <div class="col-sm-6">
              <label class="form-label fw-semibold" for="last_name">Last name</label>
              <input type="text" class="form-control form-control-pink" id="last_name"  name="last_name" required>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" for="email">Email</label>
              <input type="email" class="form-control form-control-pink" id="email"  name="email" required>
            </div>
            <div class="col-12">
              <label class="form-label fw-semibold" for="address">Address</label>
              <input type="text" class="form-control form-control-pink" id="address"  name="address" required>
            </div>
          </div>
          <hr class="my-4">
          <button class="w-100 btn btn-checkout fw-bold">
            Continue to Payment <span class="checkout-arrow">→</span>
          </button>
        </form>
      </div>
    </div>

    <!-- CART SUMMARY -->
    <div class="col-md-5 col-lg-4">
      <div class="checkout-card animate__animated animate__fadeInRight shadow-lg rounded-4 p-4 bg-white">
        <h4 class="checkout-title mb-4">Your Cart</h4>

        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between border-0 px-0">
            <span>Subtotal</span>
            <strong style="color:#ffb6c1">GHS {{ number_format($grandTotal, 2) }}</strong>
          </li>

          <li class="list-group-item d-flex justify-content-between border-0 px-0">
            <span>Shipping</span>
            <strong>Free</strong>
          </li>

          <li class="list-group-item d-flex justify-content-between fw-bold border-0 px-0 mt-3">
            <span>Total</span>
            <strong style="color: #ffb6c1">GHS {{ number_format($grandTotal, 2) }}</strong>
          </li>
        </ul>
      </div>
    </div>

  </div>
</div>


@include('layout.footer')
</body>
</html>