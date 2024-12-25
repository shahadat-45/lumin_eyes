@extends('frontEnd.layouts.master')
@push('css')
<style>
.premium-heading {
    font-family: 'Poppins', sans-serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    background: linear-gradient(90deg, #ff7e5f, #feb47b);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

.compare-card {
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.compare-card:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px);
}

.compare-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.product-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
    height: 46px;
}

.product-price {
    font-size: 1rem;
    font-weight: bold;
    color: #ff7e5f;
    margin-bottom: 10px;
}

.product-features {
    list-style: none;
    padding: 0;
    font-size: 0.9rem;
    color: #666;
}

.product-features li {
    margin-bottom: 5px;
}

.compare-actions {
    margin-top: auto;
    display: flex;
    justify-content: space-between;
    padding: 10px;
    border-top: 1px solid #e0e0e0;
    background: #f9f9f9;
}

.compare-actions button {
    font-size: 0.85rem;
    padding: 5px 10px;
}
@media (max-width: 768px) {
    .compare-card {
        flex-direction: column;
    }

    .compare-img {
        height: 150px;
    }

    .product-title {
        font-size: 1rem;
    }

    .product-price {
        font-size: 0.9rem;
    }
}
</style>

@endpush 
@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4 premium-heading">Compare Products</h1>
    <div class="row g-4 justify-content-center">
        <!-- Product Comparison Cards -->
        {{-- @dd($carts) --}}
        @foreach ($carts as $cart)
            <div class="col-lg-3 col-md-6" id="item{{ $cart->rowId }}">
                <div class="compare-card">
                    <img src="{{ asset($cart->options->image) }}" alt="Product Image" class="compare-img">
                    <div class="p-3">
                        <h5 class="product-title">{{ Str::limit($cart->name, 52) }}</h5>
                        <p class="product-price">৳ {{ $cart->price }}</p>
                        <ul class="product-features">
                            <li>{{ $cart->options->category }}</li>
                            <li>Size : {{ $cart->options->size }}</li>
                            <li>Color : {{ $cart->options->color }}</li>
                            <li>Partial Payment : {{ $cart->options->partial }}</li>
                        </ul>
                    </div>
                    <div class="compare-actions">
                        <button class="btn btn-danger btn-sm" onclick="remove_compare('{{ $cart->rowId }}')"><i class="fa-regular fa-heart"></i> Remove</button>
                        <button class="btn btn-primary btn-sm" onclick="moveToCart('{{ $cart->id }}' , '{{ $cart->rowId }}')"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>            
        @endforeach
        <!-- Repeat for up to 4 products -->
    </div>
</div>
@endsection
@push('script')
<script>
    function moveToCart(id , rowId){
        $.ajax({
            type: "POST",
            data: { id: id , rowId: rowId},
            url: "{{route('compareToCart')}}",
            success: function (data) 
            {
                if (data) {
                    $('#topActionCartNumber').html(data.cart_count);
                    $('#item' + rowId).remove();
                    loadCartItems();
                    cartCount();
                    toastr.success('Success', $data.message);
                }
            },
        });
    }
    function remove_compare(id){
        $.ajax({
            type: "GET",
            data: { id: id },
            url: "{{route('delete.compare')}}",
            success: function (data) 
            {
                if (data) {  
                    $('#wishlistCount').html(data.count);
                    $('#item' + id).remove();                
                    toastr.success('Success', 'Product remove from wishlist successfully');
                }
            },
        });
    }
</script>
@endpush