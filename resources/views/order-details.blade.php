@include('layout.header')

<body class="bg-light">

<!-- ================= ORDER DETAILS ================= -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card p-5 shadow-lg rounded-4 animate__animated animate__fadeIn border-0">
                
                <!-- Header -->
                <div class="text-center mb-4">
                    <h3 class="text-pink fw-bold">🎉 Order Confirmed!</h3>
                    <p class="text-muted">Thank you for shopping with Cilla's Emporium. Here are your order details:</p>
                </div>

                <!-- Order Details List -->
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Order Number:</span>
                        <span class="text-primary fw-bold">{{ $order->order_number }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Status:</span>
                        <span class="text-success fw-bold">{{ ucfirst($order->status) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Total:</span>
                        <span class="fw-bold">GHS {{ number_format($order->total, 2) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">Billing Email:</span>
                        <span>{{ $order->email }}</span>
                    </li>
                </ul>

                <!-- Action Buttons -->
                <div class="d-grid gap-2">
                    <a href="{{ route('index') }}" class="btn btn-gradient fw-bold py-2">Back to Shop</a>
                    <a href="{{ route('track.form') }}" class="btn btn-outline-primary fw-bold py-2">Track Your Order</a>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Optional custom styles for nice look -->
<style>
    .text-pink { color: #ff69b4; }
    .btn-gradient {
        background: linear-gradient(90deg, #ffb6c1, #ff69b4);
        color: #fff;
        border: none;
    }
    .btn-gradient:hover {
        background: linear-gradient(90deg, #ff69b4, #ff1493);
        color: #fff;
    }
    .bg-light { background-color: #f8f9fa !important; }
</style>
</body>
</html>
