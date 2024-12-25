@extends('frontEnd.layouts.master')
@push('css')
    
<style>
    body {
        background-color: #f8f9fa;
    }
    .premium-heading {
        font-family: 'Poppins', sans-serif; /* Elegant font choice */
        font-size: 2.5rem;
        font-weight: 700;
        color: #333; /* Darker shade for text */
        position: relative;
        display: inline-block;
        padding-bottom: 0px;
        width: 100%;
        background: linear-gradient(90deg, #ff7e5f, #feb47b); /* Gradient effect */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent; /* Make gradient text */
    }

    .premium-heading::after {
        content: '';
        display: block;
        height: 4px;
        width: 15%;
        margin: 0 auto;
        background: linear-gradient(90deg, #ff7e5f, #feb47b); /* Match the gradient */
        border-radius: 2px;
    }

    .wishlist-card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        transition: box-shadow 0.3s;
        background-color: #fff;
        min-height: 375px;
        display: flex;
        flex-direction: column
    }

    .wishlist-card:hover {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .wishlist-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }

    .wishlist-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }

    .wishlist-actions .btn {
        font-size: 0.875rem;
    }

    .product-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin: 10px 0;
    }

    .product-price {
        color: #28a745;
        font-weight: 700;
        font-size: 18px;
    }
</style>

@endpush 
@section('content')
<!-- end page-title -->

<!-- cart-area start -->
<div class="container py-5">
    <h1 class="text-center mb-4 premium-heading mx-auto">My Wishlist</h1>
    <div class="row g-4" style="margin-bottom: 50px">
        <!-- Wishlist Item 1 -->
        @foreach (Cart::instance('wishlist')->content() as $item)
            <div class="col-md-4 col-lg-3" id="item{{ $item->rowId }}">
                <div class="wishlist-card">
                    <img src="{{ asset($item->options->image) }}" alt="Product Image" class="wishlist-img">
                    <div class="p-3 flex-grow-1">
                        <h5 class="product-title">{{ Str::limit($item->name , 55) }}</h5>
                        <p class="product-price">${{ $item->price }}</p>
                        {{-- <p class="text-muted">A luxurious leather bag perfect for any occasion.</p> --}}
                    </div>
                    <div class="wishlist-actions">
                        <button class="btn btn-danger btn-sm" onclick="remove_wishlist('{{ $item->rowId }}')"><i class="fa-regular fa-heart"></i> Remove</button>
                        <button class="btn btn-primary btn-sm" onclick="moveToCart('{{ $item->id }}' , '{{ $item->rowId }}')"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- cart-area end -->

<!-- start of wpo-site-footer-section -->    
@endsection
@push('script')
    <script>
        function moveToCart(id , rowId){
            $.ajax({
                type: "POST",
                data: { id: id , rowId: rowId},
                url: "{{route('moveToCart')}}",
                success: function (data) 
                {
                    if (data) {  
                        $('#wishlistCount').html(data.wishlist);
                        $('#topActionCartNumber').html(data.cart_count);
                        $('#item' + rowId).remove();
                        loadCartItems();
                        cartCount();
                        toastr.success('Success', $data.message);
                    }
                },
            });
        }
    </script>
@endpush