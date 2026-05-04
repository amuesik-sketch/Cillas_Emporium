@include('layout.header')
@include('layout.navbar')

<div id="success-message" class="alert alert-success text-center d-none" role="alert"></div>


<div class="container py-5">
    <h1 class="mb-4 fw-bold " style="color: #ffb6c1">Checkout</h1>

    @if($products->count())
    <div class="row g-4">

        <!-- CART ITEMS -->
        <div class="col-lg-8">
            <div class="checkout-card animate__animated animate__fadeInLeft">
                <h4 class="checkout-title">Your Cart</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-styled">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th width="120">Qty</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $grandTotal = 0; @endphp

                            @foreach($products as $product)
                                @php
                                    $quantity = collect(session('cart'))
                                                ->filter(fn($id) => $id == $product->id)
                                                ->count();
                                    $total = $product->second * $quantity;
                                    $grandTotal += $total;
                                @endphp

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset($product->picture) }}" width="60" class="me-3 rounded">
                                            <strong>{{ $product->first }}</strong>
                                        </div>
                                    </td>
                                    <td class=" fw-semibold" style="color: #ffb6c1">${{ number_format($product->second, 2) }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 qty-control"
                                             data-id="{{ $product->id }}"
                                             data-price="{{ $product->second }}">
                                            <button class="btn btn-sm btn-outline-secondary decrease">−</button>
                                            <span class="fw-semibold quantity">{{ $quantity }}</span>
                                            <button class="btn btn-sm btn-outline-secondary increase">+</button>
                                        </div>
                                    </td>
                                    <td class="fw-bold item-total" data-total="{{ $total }}">
                                        ${{ number_format($total, 2) }}
                                    </td>
                                    <td>
                                        <form class="remove-form" data-id="{{ $product->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger remove-btn">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ORDER SUMMARY -->
        <div class="col-lg-4">
            <div class="checkout-card animate__animated animate__fadeInRight">
                <h4 class="checkout-title">Order Summary</h4>

                <div class="d-flex justify-content-between mb-2">
                    <span>Subtotal</span>
                    <strong id="subTotal" class="" style="color: #ffb6c1">${{ number_format($grandTotal, 2) }}</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Shipping</span>
                    <strong>Free</strong>
                </div>

                <hr class="my-3">

                <div class="d-flex justify-content-between mb-4">
                    <h5 class="fw-bold">Total</h5>
                    <h5 id="grandTotal" class="fw-bold " style="color: #ffb6c1">${{ number_format($grandTotal, 2) }}</h5>
                </div>

                <a href="{{ route('checkout') }}" class="btn btn-checkout w-100">
    Proceed to Checkout
    <span class="checkout-arrow">→</span>
</a>

            </div>
        </div>

    </div>

    @else
        <div class="alert alert-warning text-center mt-5">
            <i class="fa fa-shopping-cart fa-2x mb-2"></i>
            <p class="mb-0 fw-bold">Your cart is empty!</p>
            <a href="{{ route('products') }}" class="btn btn-primary mt-2">Shop Now</a>
        </div>
    @endif
</div>

@include('layout.footer')

<script>
document.addEventListener('DOMContentLoaded', function() {

    // recalc subtotal & grand total
    function recalcTotals() {
        let sum = 0;
        document.querySelectorAll('.item-total').forEach(td => {
            sum += parseFloat(td.dataset.total);
        });
        document.getElementById('subTotal').textContent = `$${sum.toFixed(2)}`;
        document.getElementById('grandTotal').textContent = `$${sum.toFixed(2)}`;
    }

    // + / − buttons
    document.querySelectorAll('.qty-control').forEach(control => {
        const id = control.dataset.id;
        const price = parseFloat(control.dataset.price);
        const qtySpan = control.querySelector('.quantity');
        const totalCell = control.closest('tr').querySelector('.item-total');

        // Increase
        control.querySelector('.increase').addEventListener('click', () => {
            fetch(`/cart/increase/${id}`, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            })
            .then(res => res.json())
            .then(data => {
                qtySpan.textContent = data.quantity;
                const newTotal = data.quantity * price;
                totalCell.textContent = `$${newTotal.toFixed(2)}`;
                totalCell.dataset.total = newTotal;
                recalcTotals();
            });
        });

        // Decrease
        control.querySelector('.decrease').addEventListener('click', () => {
            fetch(`/cart/decrease/${id}`, {
                method: 'POST',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
            })
            .then(res => res.json())
            .then(data => {
                qtySpan.textContent = data.quantity;
                const newTotal = data.quantity * price;
                totalCell.textContent = `$${newTotal.toFixed(2)}`;
                totalCell.dataset.total = newTotal;
                recalcTotals();
            });
        });
    });

    // Remove product via AJAX
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = this.closest('.remove-form');
            const id = form.dataset.id;

            fetch(`/cart/remove/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(res => {
                if(res.ok) {
                    const row = btn.closest('tr');
                    row.remove();
                    recalcTotals();
                }
            });
        });
    });

});

</script>
