@include('layout.header')

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- BRAND ONLY -->
        <a class="navbar-brand mx-auto" href="{{ route('index') }}">
            <span class="brand-logo">Cilla's</span>
            <span class="brand-text">Emporium</span>
        </a>
    </div>
</nav>

<!-- ================= ORDER CONFIRMATION ================= -->
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

{{-- @if(session('success_message') && session('order_number'))
<div class="card p-4 text-center animate__animated animate__fadeIn">
    <h5 class="mb-2">🎉 {{ session('success_message') }}</h5>
    <div class="d-flex justify-content-center align-items-center mt-2">
        <strong id="order-number" class="me-2">{{ session('order_number') }}</strong>
        <button class="btn btn-outline-primary btn-sm" onclick="copyOrderNumber()" title="Copy Order Number">
            <i class="bi bi-clipboard"></i> Copy
        </button>
    </div>
    <small class="text-muted d-block mt-2">Use this number to track your order below</small>
</div>
@endif --}}

            {{-- Success Message --}}
            @if(session('success_message') && session('order_number'))
            <div class="card p-4 mb-4 text-center shadow-lg rounded-4 animate__animated animate__fadeIn">
                <h4 class="mb-3 text-pink">🎉 Order Placed Successfully!</h4>
                <p class="text-muted mb-3">Thank you for shopping with us. Your order has been received.</p>

                <div class="d-flex justify-content-center align-items-center gap-2">
                    <strong id="order-number" class="fs-5">{{ session('order_number') }}</strong>
                    <button class="btn btn-outline-pink btn-sm" onclick="copyOrderNumber()" title="Copy Order Number">
                        <i class="bi bi-clipboard"></i> Copy
                    </button>
                </div>
                <small class="d-block mt-2 text-muted">Use this number to track your order below</small>

                <a href="{{ route('order.details', session('order_number')) }}" class="btn btn-gradient mt-4 fw-bold w-100">
                    View Order Details
                </a>
            </div>
            @endif

            {{-- Track Order Form --}}
            <div class="card p-4 shadow-lg rounded-4 animate__animated animate__fadeInUp">
                <h4 class="mb-3 text-pink">Track Your Order</h4>
                <form action="{{ route('track.order') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" id="track-input" name="order_number" class="form-control form-control-pink" placeholder="Enter Order Number" required>
                        <button class="btn btn-gradient" type="submit">Track</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- Toast notification --}}
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="copy-toast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                ✅ Order Number Copied!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

@include('layout.footer')

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
function copyOrderNumber() {
    const orderNumber = document.getElementById('order-number').innerText;

    navigator.clipboard.writeText(orderNumber).then(() => {
        document.getElementById('track-input').value = orderNumber;

        const toastEl = document.getElementById('copy-toast');
        const toast = new bootstrap.Toast(toastEl, { delay: 2000 });
        toast.show();
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}
</script>
</body>
</html>
