@include('layout.header')

    @include('layout.navbar')
  
    <!-- Hero Start -->
    <div class="container-fluid  hero-header mb-5" style="background-color: #ffb6c1">
        <div class="container text-center">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 animated slideInDown">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Hero End -->
        <!-- Product Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class=" mb-3" style="color: #ffb6c1"><span class="fw-light text-dark">{{$items->first}}</span> {{$items->second}}</h1>
                <p class="mb-5">{{ $items->third }}</p>
            </div>

            <!-- Search & Filter Start -->
<form method="GET" action="{{ route('products') }}" id="filterForm">
    <div class="row g-3 mb-4 align-items-end">

        <!-- Search -->
        <div class="col-md-4">
            <label class="form-label">Search</label>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Search products..."
            >
        </div>

        <!-- Min Price -->
        <div class="col-md-3">
            <label class="form-label">Min Price</label>
            <input
                type="number"
                name="min_price"
                value="{{ request('min_price') }}"
                class="form-control"
                placeholder="0"
            >
        </div>

        <!-- Max Price -->
        <div class="col-md-3">
            <label class="form-label">Max Price</label>
            <input
                type="number"
                name="max_price"
                value="{{ request('max_price') }}"
                class="form-control"
                placeholder="1000"
            >
        </div>

        <!-- Button -->
        <div class="col-md-2 d-grid">
            <button class="btn btn-primary">
                Filter
            </button>
        </div>

    </div>
</form>
<!-- Search & Filter End -->


            <div class="row g-4">
                    @foreach ($products as $product)
    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="product-item text-center border h-100 p-4">
            <img class="img-fluid mb-4" src="{{ asset($product->picture) }}" alt="">
            <div class="mb-2">
                @for ($i = 1; $i <= 5; $i++)
                    <small class="fa fa-star {{ $i <= $product->rating ? : 'text-muted' }}" style="color: #ffb6c1;"></small>
                @endfor
                <small>({{ $product->reviews_count }})</small>
            </div>
            <a href="" class="h6 d-inline-block mb-2">{{ $product->first }}</a>
            <h5 class=" mb-3" style="color: #ffb6c1">${{ $product->second }}</h5>
    <button
    type="button"
    class="btn btn-primary add-to-cart-btn"
    data-id="{{ $product->id }}">
    Add to Cart
</button>

    </div>
</div>
@endforeach

            </div>
        </div>
    </div>
    <!-- Product End -->
    @include('layout.newsletter')
   
    @include('layout.footer')