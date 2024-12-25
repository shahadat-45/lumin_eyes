@extends('frontEnd.layouts.master')
@section('title', $details->name)
@push('seo')
    <meta name="app-url" content="{{ route('product', $details->slug) }}"/>
    <meta name="robots" content="index, follow"/>
    <meta name="description" content="{{ $details->meta_description }}"/>
    <meta name="keywords" content="{{ $details->slug }}"/>

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product"/>
    <meta name="twitter:site" content="{{ $details->name }}"/>
    <meta name="twitter:title" content="{{ $details->name }}"/>
    <meta name="twitter:description" content="{{ $details->meta_description }}"/>
    <meta name="twitter:creator" content="gomobd.com"/>
    <meta property="og:url" content="{{ route('product', $details->slug) }}"/>
    <meta name="twitter:image" content="{{ asset($details->image->image) }}"/>

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $details->name }}"/>
    <meta property="og:type" content="product"/>
    <meta property="og:url" content="{{ route('product', $details->slug) }}"/>
    <meta property="og:image" content="{{ asset($details->image->image) }}"/>
    <meta property="og:description" content="{{ $details->meta_description }}"/>
    <meta property="og:site_name" content="{{ $details->name }}"/>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/zoomsl.css') }}">

    <style>
        .container {
            max-width: 1188px !important;
            margin: auto;
        }

        .product-title {
            color: #212121;
            font-size: 22px;
            font-weight: 400;
            word-break: break-word;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        .pdp-mod-product-badge-wrapper img {
            vertical-align: baseline;
        }

        .pdp-mod-product-badge {
            max-height: 16px;
            margin-right: 8px;
        }

        .pdp-mod-product-badge img {
            border-style: none;
        }

        .brand-name {

            display: inline-block;
            vertical-align: middle;
            margin-right: 4px;
            color: #9e9e9e;
            font-size: 12px;

        }

        .pdp-mod-product-price {
            position: relative;
        }

        .pdp-product-price {
            display: inline-block;
            padding: 16px 0 17px;
        }

        .pdp-price_size_xl {
            font-size: 30px;
        }

        .pdp-price_color_orange {
            color: #f57224;
        }

        .pdp-price_type_deleted {
            text-decoration: line-through;
        }

        .pdp-price_size_xs {
            font-size: 14px;
        }

        .pdp-price_color_lightgray {
            color: #9e9e9e;
        }

        .pdp-product-price__discount {
            font-size: 14px;
            color: #212121;
            margin-left: 6px;
        }

        .sku-selector {
            border-top: 1px solid #eff0f5;
        }

        .sku-quantity-selection {
            padding-top: 24px !important;
        }

        .pdp-mod-product-info-section {
            padding: 8px 0;
        }

        .section-title {
            padding-top: 7px;
        }

        .section-title {
            display: inline-block;
            margin: 0;
            width: 92px;
            color: #757575;
            word-wrap: break-word;
            font-size: 14px;
            font-weight: 400;
            vertical-align: top;
        }

        .delivery {
            font-size: 14px;
            background-color: #fafafa;
            color: #212121;
        }
        .delivery-header {
            display: table;
            padding: 20px 16px 2px;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
        }
        .delivery-header__title {
            display: table-cell;
            font-size: 12px;
            line-height: 12px;
            color: #757575;
            font-weight: 500;
            font-family: Roboto-Medium;
            width: 300px;
        }

        .delivery-header__tooltip {
            display: table-cell;
            text-align: right;
        }

        .delivery-tooltip__icon {
            color: #757575;
            cursor: pointer;
        }
        
        svg:not(:root) {
            overflow: hidden;
        }

        .svgfont {
            display: inline-block;
            width: 1em;
            height: 1em;
            fill: currentColor;
            font-size: 1em;
        }

        .delivery__header {
            margin-bottom: 8px;
            border-bottom: 1px solid #eff0f5;
        }
        .delivery__location, .delivery__option .delivery-option-item {
            padding: 10px 16px;
        }

        .delivery__location .location__current {
            box-sizing: border-box;
        }

        .location__body {
            display: table;
            width: 100%;
            align-items: center;
        }

        .location__address {
            display: table-cell;
            vertical-align: middle;
            color: #202020;
            padding-right: 15px;
            padding-left: 5px;
        }

        .location__link-change {
            display: table-cell;
            vertical-align: middle;
            color: #009db4;
            text-align: right;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .location-link_size_xs {
            font-size: 13px;
        }

        .location-link, .location-link:visited, .seller-container .seller-name .seller-im-wrapper .seller-im-content {
            color: #136cff;
        }

        .delivery__content {
            position: relative;
            padding-bottom: 4px;
        }
        .delivery__option
        {
            border-bottom: 1px solid #eff0f5;
        }

        .delivery__option .delivery-option-item {
            padding: 10px 16px;
        }

        .delivery-option-item__body {
            display: table;
            border-collapse: collapse;
            width: 100%;
        }

        .delivery-option-item__icon {
            display: table-cell;
            padding-right: 10px;
            width: 35px;
            box-sizing: border-box;
        }

        .delivery-option-item__info {
            padding-left: 5px;
            display: table-cell;
            vertical-align: middle;
        }

        .delivery-option-item__shipping-fee.no-subtitle {
            vertical-align: middle;
        }
        .delivery-option-item__shipping-fee {
            font-weight: 500;
            font-family: Roboto-Medium;
            padding-left: 5px;
            display: table-cell;
            text-align: right;
            white-space: nowrap;
        }

        .warranty {
            font-size: 14px;
            background-color: #fafafa;
            color: #212121;
            /*border-top: 1px solid #eff0f5;*/
        }

        .warranty__option-item {
            padding: 10px 16px;
        }
        .delivery-option-item__body {
            display: table;
            border-collapse: collapse;
            width: 100%;
        }
        
        .delivery-option-item__icon {
             display: table-cell;
             padding-right: 10px;
             width: 35px;
             box-sizing: border-box;
         }
        .pc-custom-link {            
            overflow: hidden;
        }
        .picture-wrapper:hover .sidebar{
            left: 0;

        }
        .sidebar{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: -36px;
            transition: all 0.5s ease;
            & ul li{
                height: 32px;
                width: 32px;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 32px;
                background: #000;
                margin-bottom: 6px;
                & svg{
                    color: white;
                    font-size: 22px
                }
            }      
        }

    </style>
@endpush

@section('content')
    <div class="homeproduct main-details-page">
        <div class="container">
            <div class="row">
                <div id="J_breadcrumb_list" class="breadcrumb_list">
                    <ul class="breadcrumb" id="J_breadcrumb">
                        <li class="breadcrumb_item"><span class="breadcrumb_item_text"><a href=""
                                                                                          class="breadcrumb_item_anchor"><span>{{$details->category->name}}</span></a><div
                                        class="breadcrumb_right_arrow"></div></span></li>
                        
                        @if(isset($details->subcategory)) 
                        <li class="breadcrumb_item">
                            <span class="breadcrumb_item_text">
                                <a href="" class="breadcrumb_item_anchor"><span>{{$details->subcategory->subcategoryName}}</span>
                                </a>
                                <div class="breadcrumb_right_arrow"></div>
                            
                            </span>
                        </li>
                        @endif
                        <li class="breadcrumb_item">
                            <span class="breadcrumb_item_text">
                                <span class="breadcrumb_item_anchor breadcrumb_item_anchor_last">{{$details->name}}</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="product-section">
                        <div class="container">

                            <div class="row">
                                <div class="col-sm-4 position-relative">
 
                                    <div class="details_slider owl-carousel">
                                        @foreach ($details->images as $value)
                                            <div class="dimage_item">
                                                <img src="{{ asset($value->image) }}" class="block__pic"/>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div
                                            class="indicator_thumb @if ($details->images->count() > 4) thumb_slider owl-carousel @endif">
                                        @foreach ($details->images as $key => $image)
                                            <div class="indicator-item" data-id="{{ $key }}">
                                                <img src="{{ asset($image->image) }}"/>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-sm-5">
                                    <div class="details_right">


                                        <div class="product">
                                            <div class="product-cart">
                              

                                                <div class="pdp-mod-product-badge-wrapper">
                                                    <img src="https://img.drz.lazcdn.com/g/tps/imgextra/i1/O1CN01cLS4Rj1vgZ8xaij1e_!!6000000006202-2-tps-64-32.png"
                                                         class="pdp-mod-product-badge">
                                                    <p class="product-title">{{ $details->name }}</p>
                                                </div>
 
                                                <div class="details-ratting-wrapper mt-4">
                                                    @php
                                                        $averageRating = $reviews->avg('ratting');
                                                        $filledStars = floor($averageRating);
                                                        $emptyStars = 5 - $filledStars;
                                                    @endphp

                                                    @if ($averageRating >= 0 && $averageRating <= 5)
                                                        @for ($i = 1; $i <= $filledStars; $i++)
                                                            <i class="fas fa-star"></i>
                                                        @endfor

                                                        @if ($averageRating == $filledStars)
                                                     
                                                        @else
                                                            <i class="far fa-star-half-alt"></i>
                                                        @endif

                                                        @for ($i = 1; $i <= $emptyStars; $i++)
                                                            <i class="far fa-star"></i>
                                                        @endfor

                                                        <span>{{ number_format($averageRating, 2) }}/5</span>
                                                    @else
                                                        <span>Invalid rating range</span>
                                                    @endif
                                                    <a class="all-reviews-button" href="#writeReview">See Reviews</a>
                                                </div>
 
                                                <form action="{{ route('cart.store') }}" method="POST" name="formName">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $details->id }}"/>
                                                    @if ($productcolors->count() > 0)
                                                        <div class="pro-color" style="width: 100%;">
                                                            <div class="color_inner">
                                                                <p>Color -</p>
                                                                <div class="size-container">
                                                                    <div class="selector">
                                                                        @foreach ($productcolors as $procolor)
                                                                            <div class="selector-item">
                                                                                <input type="radio"
                                                                                       id="fc-option{{ $procolor->id }}"
                                                                                       value="{{ $procolor->color ? $procolor->color->colorName : '' }}"
                                                                                       name="product_color"
                                                                                       class="selector-item_radio emptyalert"
                                                                                       />
                                                                                <label for="fc-option{{ $procolor->id }}"
                                                                                       style="background-color: {{ $procolor->color ? $procolor->color->color : '' }}"
                                                                                       class="selector-item_label">
                                                                                <span>
                                                                                    <img src="{{ asset('public/frontEnd/images') }}/check-icon.svg"
                                                                                         alt="Checked Icon"/>
                                                                                </span>
                                                                                </label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif @if ($productsizes->count() > 0)
                                                        <div class="pro-size" style="width: 100%;">
                                                            <div class="size_inner">
                                                                <p>Size - <span class="attibute-name"></span></p>
                                                                <div class="size-container">
                                                                    <div class="selector">
                                                                        @foreach ($productsizes as $prosize)
                                                                            <div class="selector-item">
                                                                                <input type="radio"
                                                                                       id="f-option{{ $prosize->id }}"
                                                                                       value="{{ $prosize->size ? $prosize->size->sizeName : '' }}"
                                                                                       name="product_size"
                                                                                       class="selector-item_radio emptyalert"
                                                                                       />
                                                                                <label
                                                                                        for="f-option{{ $prosize->id }}"
                                                                                        class="selector-item_label">{{ $prosize->size ? $prosize->size->sizeName : '' }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if ($details->pro_unit)
                                                        <div class="pro_unig">
                                                            <label>Unit: {{ $details->pro_unit }}</label>
                                                            <input type="hidden" name="pro_unit"
                                                                   value="{{ $details->pro_unit }}"/>
                                                        </div>
                                                    @endif
                                                    <div class="pro_brand mt-3">
                                                        <p class="brand-name">Brand :
                                                            {{ $details->brand ? $details->brand->name : 'N/A' }}
                                                        </p>
                                                    </div>
                                                    <div id="module_sku-select" class="pdp-block module">
                                                        <div class="sku-selector"></div>
                                                    </div>

                                                    <div id="module_product_price_1" class="pdp-block module">
                                                        <div class="pdp-mod-product-price">
                                                            <div class="pdp-product-price">
                                                                <span class="notranslate pdp-price pdp-price_type_normal pdp-price_color_orange pdp-price_size_xl">৳ {{$details->new_price}}</span>
                                                                <div class="origin-block"><span
                                                                            class="notranslate pdp-price pdp-price_type_deleted pdp-price_color_lightgray pdp-price_size_xs">৳ {{$details->old_price}}</span>
                                                                    <span class="pdp-product-price__discount">-{{round((($details->old_price - $details->new_price) / $details->old_price) * 100)}}%</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="module_sku-select" class="pdp-block module">
                                                        <div class="sku-selector"></div>
                                                    </div>
                                                    {{--Select QTY Start--}}
                                                    <div class="row">
                                                        <div class="col-sm-6 d-flex">
                                                            <div class="col-sm-6">
                                                                <h6 class="section-title">Quantity</h6>
                                                            </div>
                                                            <div class="qty-cart col-sm-6">
                                                                <div class="quantity">
                                                                    <span class="minus">-</span>
                                                                    <input type="text" name="qty"
                                                                           value="1"/>
                                                                    <span class="plus">+</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{--Select QTY End--}}

                                                    <div class="row mt-2">
                                                        <div class="col-sm-12 d-flex gap-2">
                                                            <div class="d-flex single_product col-sm-6 justify-content-center">
                                                                <input type="submit"
                                                                       class="btn px-4 order_now_btn order_now_btn_m"
                                                                       @if($productcolors->count() > 0) onclick="return sendSuccess();" @endif
                                                                       name="order_now"
                                                                       value="Order Now"/>
                                                            </div>
                                                            <div class="d-flex single_product col-sm-6 justify-content-center">
                                                                <input type="button" class="btn px-4 add_cart_btn" @if($productcolors->count() > 0) onclick="return sendSuccess();" @endif onclick="addToCartAjax('{{ $details->id }}')" value="Add to Cart"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div id="block-5EZ_y_eaaqO" class="pdp-block pdp-block__delivery-seller">
                                        <div id="module_seller_delivery" class="pdp-block module">
                                            <div data-spm="delivery_options" data-nosnippet="true" data-spm-max-idx="0">
                                                <div class="delivery">
                                                    <div class="delivery-header">
                                                        <div class="delivery-header__title">
                                                            Delivery Options&nbsp;
                                                        </div> 
                                                    </div>
                                                    <div class="delivery__header">
                                                        <div class="location delivery__location">
                                                            <div class="location__current">
                                                                <div class="location__body"><i
                                                                            class="fa fa-location-dot"></i>
                                                                    
                                                                    @auth('customer')
                                                                        @if(isset(Auth::guard('customer')->user()->address)) 
                                                                    <div class="location__address">
                                                                        {{ Auth::guard('customer')->user()->address }}
                                                                    </div>
                                                                        @else
                                                                            <div class="location__address">
                                                                                Set Address From Account
                                                                            </div>
                                                                            
                                                                        @endif
                                                                    @endauth
                                                                    
                                                                    @guest('customer')
                                                                        <div class="location__address">
                                                                            <a href="{{url('customer/login')}}" class="text-primary text-decoration-underline"> Login </a> to see your address
                                                                        </div>
                                                                        
                                                                    @endguest
                                                                    <div class="location__link-change">
                                                                        <a href="{{url('customer/profile-edit')}}" class="location-link location-link_size_xs automation-location-link-change">CHANGE</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="delivery__content">
                                                        <div class="delivery__options">
                                                            <div class="delivery__option">
                                                                <div class="delivery-option-item delivery-option-item_type_standard">
                                                                    <div class="delivery-option-item__body">
                                                                        <i class="fa fa-money-bill"></i>
                                                                        <div class="delivery-option-item__info">
                                                                            <div class="delivery-option-item__title"
                                                                                 data-spm-anchor-id="a2a0e.pdp_revamp.delivery_options.i1.244913aeSvUWtO">
                                                                                Standard Delivery
                                                                            </div>
                                                                            <div class="delivery-option-item__time">
                                                                                (Inside Dhaka)
                                                                            </div>
                                                                        </div>
                                                                        <div class="delivery-option-item__shipping-fee no-subtitle">
                                                                            ৳ {{App\Models\ShippingCharge::where('id',1)->first()->amount}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="delivery__option">
                                                                <div class="delivery-option-item delivery-option-item_type_standard">
                                                                    <div class="delivery-option-item__body">
                                                                        <i class="fa fa-money-bill"></i>
                                                                        <div class="delivery-option-item__info">
                                                                            <div class="delivery-option-item__title"
                                                                                 data-spm-anchor-id="a2a0e.pdp_revamp.delivery_options.i1.244913aeSvUWtO">
                                                                                Standard Delivery
                                                                            </div>
                                                                            <div class="delivery-option-item__time">
                                                                                (Outside Dhaka)
                                                                            </div>
                                                                        </div>
                                                                        <div class="delivery-option-item__shipping-fee no-subtitle">
                                                                            ৳ {{App\Models\ShippingCharge::where('id',2)->first()->amount}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="module_redmart_delivery" class="pdp-block module"></div>
                                        <div id="module_selling_point" class="pdp-block module">
                                            <div class="lazyload-wrapper "></div>
                                        </div>
                                        <div id="module_seller_warranty" class="pdp-block module">
                                            <div class="warranty" data-spm="return_warranty" data-nosnippet="true">
                                                <div class="delivery-header">
                                                    <div class="delivery-header__title">Product Quality
                                                    </div>
                                                    <div class="delivery-header__tooltip">
                                                        <div><i class="delivery-tooltip__icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="warranty__options">
                                                    <div class="warranty__option-item">
                                                        <div class="delivery-option-item delivery-option-item_type_returnPolicy14">
                                                            <div class="delivery-option-item__body"><i
                                                                        class="fa fa-award"></i>
                                                                <div class="delivery-option-item__info">
                                                                    <div class="delivery-option-item__title">
                                                                        100% Original Product Guarantee
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="module_seller_warranty" class="pdp-block module">
                                            <div class="warranty" style="border-top: 1px solid #eff0f5;" data-spm="return_warranty" data-nosnippet="true">
                                                <div class="delivery-header">
                                                    <div class="delivery-header__title">Return & Warranty
                                                    </div>
                                                    <div class="delivery-header__tooltip">
                                                        <div><i class="delivery-tooltip__icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="warranty__options">
                                                    <div class="warranty__option-item">
                                                        <div class="delivery-option-item delivery-option-item_type_returnPolicy14">
                                                            <div class="delivery-option-item__body"><i
                                                                        class="fa fa-rotate-left"></i>
                                                                <div class="delivery-option-item__info">
                                                                    <div class="delivery-option-item__title">
                                                                        Easy Return Policy
                                                                        (Conditions Apply)
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        @if ($details->note)
                                        <div id="module_seller_warranty" class="pdp-block module">
                                            <div class="warranty" style="border-top: 1px solid #eff0f5;" data-spm="return_warranty" data-nosnippet="true">
                                                <div class="delivery-header">
                                                    <div class="delivery-header__title">Note
                                                    </div>
                                                    <div class="delivery-header__tooltip">
                                                        <div><i class="delivery-tooltip__icon"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="warranty__options">
                                                    <div class="warranty__option-item">
                                                        <div class="delivery-option-item delivery-option-item_type_returnPolicy14">
                                                            <div class="delivery-option-item__body">
                                                                <div class="delivery-option-item__info">
                                                                    <div class="delivery-option-item__title">
                                                                        {{ $details->note }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>                                            
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="description-nav-wrapper">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="description-nav">
                        <ul class="desc-nav-ul"> 
                            <li>
                                <a href="#description" target="_self">Description</a>
                            </li> 
                            <li>
                                <a href="#writeReview" target="_self">Reviews ({{ $reviews->count() }}) </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="pro_details_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="description tab-content details-action-box" id="description">
                        <h2>বিস্তারিত</h2>
                        <p>{!! $details->description !!}</p>
                    </div>

                </div>

            </div>
 

            <div class="row">
                <div class="col-10">
                    <div class="tab-content details-action-box" id="writeReview">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="section-head">
                                        <div class="title">
                                            <h2>Reviews ({{ $reviews->count() }})</h2>
                                            <p>Get specific details about this product from customers who own it.</p>
                                        </div>
                                        <div class="action">
                                            <div>
                                                <button type="button"
                                                        class="details-action-btn question-btn btn-overlay"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Write a review
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($reviews->count() > 0)
                                        <div class="customer-review">
                                            <div class="row">
                                                @foreach ($reviews as $key => $review)
                                                    <div class="col-sm-12 col-12">
                                                        <div class="review-card">
                                                            <p class="reviewer_name"><i
                                                                        data-feather="message-square"></i>
                                                                {{ $review->name }}</p>
                                                            <p class="review_data">{{ $review->created_at->format('d-m-Y') }}</p>
                                                            <p class="review_star">{!! str_repeat('<i class="fa-solid fa-star"></i>', $review->ratting) !!}</p>
                                                            <p class="review_content">{{ $review->review }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="empty-content">
                                            <i class="fa fa-clipboard-list"></i>
                                            <p class="empty-text">This product has no reviews yet. Be the first one to
                                                write a review.</p>
                                        </div>
                                    @endif
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Your review</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="insert-review">
                                                        @if (Auth::guard('customer')->user())
                                                            <form action="{{ route('customer.review') }}"
                                                                  id="review-form"
                                                                  method="POST">
                                                                @csrf
                                                                <input type="hidden" name="product_id"
                                                                       value="{{ $details->id }}">
                                                                <div class="fz-12 mb-2">
                                                                    <div class="rating">
                                                                        <label title="Excelent">
                                                                            ☆
                                                                            <input required type="radio" name="ratting"
                                                                                   value="5"/>
                                                                        </label>
                                                                        <label title="Best">
                                                                            ☆
                                                                            <input required type="radio" name="ratting"
                                                                                   value="4"/>
                                                                        </label>
                                                                        <label title="Better">
                                                                            ☆
                                                                            <input required type="radio" name="ratting"
                                                                                   value="3"/>
                                                                        </label>
                                                                        <label title="Very Good">
                                                                            ☆
                                                                            <input required type="radio" name="ratting"
                                                                                   value="2"/>
                                                                        </label>
                                                                        <label title="Good">
                                                                            ☆
                                                                            <input required type="radio" name="ratting"
                                                                                   value="1"/>
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                                    <textarea required class="form-control radius-lg"
                                                                              name="review"
                                                                              id="message-text"></textarea>
                                                                    <span id="validation-message"
                                                                          style="color: red;"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button class="details-review-button" type="submit">
                                                                        Submit
                                                                        Review
                                                                    </button>
                                                                </div>

                                                            </form>
                                                        @else
                                                            <a class="customer-login-redirect"
                                                               href="{{ route('customer.login') }}">Login
                                                                to Post
                                                                Your Review</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 


    <div class="pc-custom-link hp-mod-card jfy-comp-container">
        <div class="hp-mod-card-header"><span class="hp-mod-card-title sec-headline">You May Also Like</span>
        </div>
        <div class="hp-mod-card-content">
            <div class="card-jfy-wrapper">
                @forelse($products->take(12) as $key => $value)
                    <a class="pc-custom-link jfy-item hp-mod-card-hover fade-effect"  fade-direction="left" fade-time="1">
                        <div class="picture-wrapper common-img jfy-item-image img-w100p" >
                            <img onclick="window.location.href='{{ route('product', $value->slug) }}'" src="{{asset($value->image->image)}}" style="object-fit: cover;">                            
                            <div class="sidebar">
                                <ul>
                                    <li onclick="addTowishlist('{{ $value->id }}')"><i class="fa-regular fa-heart"></i></li>
                                    <li onclick="window.location.href='{{route('product',$value->slug)}}'"><i class="fa-regular fa-eye"></i></li>
                                    <li onclick="addToCompare('{{ $value->id }}')"><i class="fa-solid fa-chart-simple"></i></li>
                                    <li onclick="addToCartAjax('{{ $value->id }}')"><i class="fa-solid fa-cart-plus"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-jfy-item-desc">
                            <div class="card-jfy-title two-line-clamp">
                                {{$value->name}}
                            </div>
                            <div class="hp-mod-price">
                                <div class="hp-mod-price-first-line">
                                    <span class="currency">৳</span>
                                    <span class="price">{{$value->new_price}}</span>
                                    <span class="hp-mod-discount align-left"> -{{ round((($value->old_price- $value->new_price)/$value->old_price) * 100)}}%</span>
                                </div>
                            </div>


                        </div>
                    </a>
                @empty
                @endforelse
            </div>
            <div class="jfy-card-load-more">
                <a href="{{route('allproducts')}}">
                    <div class="load-more-button">
                        Load More
                    </div>
                </a>
            </div>
            <div class="card-jfy-loading">
                <div class="daraz-loading-container"></div>
            </div>
        </div>
    </div>
@endsection @push('script')
    <script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/zoomsl.min.js') }}"></script>

    <script>
        $(document).ready(function () {
            $(".details_slider").owlCarousel({
                margin: 15,
                items: 1,
                loop: true,
                dots: false,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
            });
            $(".indicator-item").on("click", function () {
                var slideIndex = $(this).data("id");
                $(".details_slider").trigger("to.owl.carousel", slideIndex);
            });
        });
    </script>     
    <script>
        $(document).ready(function () {
            $(".related_slider").owlCarousel({
                margin: 10,
                items: 6,
                loop: true,
                dots: true,
                nav: true,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        nav: true,
                    },
                    600: {
                        items: 3,
                        nav: false,
                    },
                    1000: {
                        items: 6,
                        nav: true,
                        loop: true,
                    },
                },
            });
            // $('.owl-nav').remove();
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".minus").click(function () {
                var $input = $(this).parent().find("input");
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $(".plus").click(function () {
                var $input = $(this).parent().find("input");
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>

<script>
    function sendSuccess() {
        // size validation
        // size = $('input[type=radio][name=product_size]:checked').val();
        // if (size) {
        //     // access
        // } else {
        //     toastr.warning("Please select any size");
        //     return false;
        // }
        color = $('input[type=radio][name=product_color]:checked').val();
        if (color) {
            // access
        } else {
            toastr.error("Please select any color");
            return false;
        }
    }
</script>
    <script>
        $(document).ready(function () {
            $(".rating label").click(function () {
                $(".rating label").removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".thumb_slider").owlCarousel({
                margin: 15,
                items: 4,
                loop: true,
                dots: false,
                nav: true,
                autoplayTimeout: 6000,
                autoplayHoverPause: true,
            });
        });
    </script>

    <script type="text/javascript">
        $(".block__pic").imagezoomsl({
            zoomrange: [3, 3]
        });
    </script>
@endpush
