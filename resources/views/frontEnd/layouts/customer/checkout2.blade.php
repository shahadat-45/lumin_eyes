@extends('frontEnd.layouts.master')
@section('title', 'Customer Checkout')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/select2.min.css') }}"/>
    
    <style>
        #container 
        {
            width: 1188px !important;
            margin: 0 auto;
        }
        
        #container2 * 
        {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        #container2, .lzd-playground-main 
        {
            background-color: #f4f4f4;
        }

        .lzd-playground-main 
        {
            min-height: 675px;
        }

        #container2, .lzd-playground-main 
        {
            background-color: #f4f4f4;
        }


    </style>
@endpush
@section('content')
    <div id="container" class="container">
        <div>
            <div class="root">
                <div id="container_10008" class="container" style="margin-top: 12px;">
                    <div id="leftContainer_10009" class="container" style="width: 788px; float: left;">
                        <div class="delivery-info-container">
                            <div>
                                <div class="mod-guest-register">
                                    <div class="mod-guest-register-hd"
                                         data-spm-anchor-id="a2o42.shipping.0.i3.4b592829XFX9Aq">Delivery Information
                                    </div>
                                    <form>
                                        <div class="mod-address-form mod-bd">
                                            <div class="mod-address-form-bd">
                                                <div class="mod-address-form-left">
                                                    <div class="mod-input mod-input-name"><label>Full name</label><input
                                                                placeholder="Enter your first and last name"
                                                                data-meta="Field" type="text"
                                                                value=""><b></b><span></span></div>
                                                    <div class="mod-input mod-input-phone"><label>Phone
                                                            Number</label><input
                                                                placeholder="Please enter your phone number"
                                                                data-meta="Field" type="number" inputmode="numeric"
                                                                pattern="[0-9]*" value=""><b></b><span></span></div>
                                                    <div class="mod-input mod-input-detail-address-1"><label>Building /
                                                            House No / Floor / Street</label><input
                                                                placeholder="Please enter" data-meta="Field" type="text"
                                                                value=""><b></b><span></span></div>
                                                    <div class="mod-input mod-input-detail-address-2"><label>Colony /
                                                            Suburb / Locality / Landmark</label><input
                                                                placeholder="Please enter" data-meta="Field" type="text"
                                                                value=""><b></b><span></span></div>
                                                </div>
                                                <div class="mod-address-form-right">
                                                    <div class="mod-select mod-address-form-select mod-select-location-tree-1">
                                                        <label>Region</label><span data-meta="Field"
                                                                                   class="next-select large"
                                                                                   tabindex="0"><input type="hidden"
                                                                                                       name="select-faker"
                                                                                                       value=""><span
                                                                    class="next-select-inner"><span
                                                                        class="next-select-placeholder">Please choose your region</span></span><i
                                                                    class="next-icon next-icon-arrow-down next-icon-medium next-select-arrow"></i></span><b></b>
                                                    </div>
                                                    <div class="mod-select disable mod-address-form-select mod-select-location-tree-2">
                                                        <label>City</label><span data-meta="Field"
                                                                                 class="next-select disabled large"><input
                                                                    type="hidden" name="select-faker" value=""><span
                                                                    class="next-select-inner"><span
                                                                        class="next-select-placeholder">Please choose your city</span></span><i
                                                                    class="next-icon next-icon-arrow-down next-icon-medium next-select-arrow"></i></span><b></b>
                                                    </div>
                                                    <div class="mod-select disable mod-address-form-select mod-select-location-tree-3">
                                                        <label>Area</label><span data-meta="Field"
                                                                                 class="next-select disabled large"><input
                                                                    type="hidden" name="select-faker" value=""><span
                                                                    class="next-select-inner"><span
                                                                        class="next-select-placeholder">Please choose your area</span></span><i
                                                                    class="next-icon next-icon-arrow-down next-icon-medium next-select-arrow"></i></span><b></b>
                                                    </div>
                                                    <div class="mod-input mod-input-detailAddress">
                                                        <label>Address</label><input
                                                                placeholder="For Example: House# 123, Street# 123, ABC Road"
                                                                data-meta="Field" type="text"
                                                                value=""><b></b><span></span></div>
                                                    <div class="mod-address-tag"><p class="mod-address-tag-title">Select
                                                            a label for effective delivery:</p>
                                                        <div class="mod-address-tag-content">
                                                            <div class="mod-address-tag-item mod-address-tag-work ">
                                                                <span class="mod-address-tag-icon select-tag-work"></span><span>OFFICE</span>
                                                            </div>
                                                            <div class="mod-address-tag-item mod-address-tag-home ">
                                                                <span class="mod-address-tag-icon select-tag-home"></span><span>HOME</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mod-address-form-action">
                                                <button tabindex="9" type="submit"
                                                        class="next-btn next-btn-primary next-btn-large mod-address-form-btn">
                                                    SAVE
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="package">
                            <div class="package-title clearfix">
                                <div class="package-title-left"><span class="package-title-name">Package  1 of 1</span>
                                </div>
                                <div class="package-title-right"><span class="package-title-tips">Shipped by</span><span
                                            class="package-title-brand">AL HARAMAIN PERFUMES</span></div>
                            </div>
                            <div id="delivery_50b1e24b5a63bcf662481ee429e3c68b_delivery" class="delivery-option">
                                <div>
                                    <div class="delivery-option-body">
                                        <div class="delivery-slider">
                                            <div class="delivery-slider-content"><p class="delivery-slider-title">
                                                    Delivery Option</p></div>
                                            <div class="delivery-slider-wrap without-arrow">
                                                <div class="next-slick next-slick-outer next-slick-horizontal">
                                                    <div draggable="false"
                                                         class="next-slick-inner next-slick-initialized">
                                                        <div class="next-slick-list">
                                                            <div class="next-slick-track"
                                                                 style="opacity: 1; width: 1782.67px; transform: translate3d(0px, 0px, 0px);">
                                                                <div class="next-slick-slide next-slick-active delivery-item"
                                                                     data-index="0" tabindex="-1"
                                                                     style="outline: none; width: 254.667px;">
                                                                    <div class="delivery-item-inner delivery-item-selected">
                                                                        <div class="delivery-item-top">
                                                                            <div class="delivery-item-content">
                                                                                <div class="delivery-item-first-line">
                                                                                    <span class="lazada lazada-ic-sucess lazada-icon delivery-item-icon delivery-item-selected-icon"></span>
                                                                                    <div class="delivery-item-price">
                                                                                        <span class="delivery-item-current-price">৳ 60</span><span
                                                                                                class="delivery-item-origin-price"></span>
                                                                                    </div>
                                                                                </div>
                                                                                <p class="delivery-item-name-wrap"><span
                                                                                            class="delivery-item-name">Standard Delivery</span>
                                                                                </p></div>
                                                                        </div>
                                                                        <div class="delivery-item-cp-wrap"></div>
                                                                        <div class="delivery-item-bottom delivery-item-bottom-no-schedule-selected-nlu"
                                                                             data-spm="confirm"><p
                                                                                    class="delivery-item-time">
                                                                                Guaranteed by 22-26 Nov</p></div>
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
                            <div style="padding-left: 10px; padding-right: 10px;">
                                <div id="item_c1ff81a45d3bf8bcd503c1876f233ee6" class="cart-item">
                                    <div class="cart-item-inner">
                                        <div class="cart-item-left">
                                            <div class="img-wrap"><a href="#"
                                                                     id="automation-link-from-image-to-prod-item_c1ff81a45d3bf8bcd503c1876f233ee6"
                                                                     class="automation-link-from-image-to-prod"><img
                                                            class="img"
                                                            src="https://img.lazcdn.com/3rd/q/aHR0cHM6Ly9zdGF0aWMtMDEuZGFyYXouY29tLmJkL3AvZjNiNGZkNmFjNWUxM2RmNjZmN2Q2NDlmZDJkYjM1ZGIuanBn_2200x2200q75.png_.webp"
                                                            alt="item"></a></div>
                                            <div class="content"><a
                                                        id="automation-link-from-title-to-prod-item_c1ff81a45d3bf8bcd503c1876f233ee6"
                                                        href="#" class="automation-link-from-title-to-prod title"><img
                                                            src="https://img.lazcdn.com/us/lazgcp/d3abdc19-83a0-4da8-b11d-f42cf7b66552_ALL-92-36.png_2200x2200q75.png_.webp"
                                                            alt="" class="promoted-icon">Al haramain ডিওডোরেন্ট এনটোরাজ
                                                    রুজ 200 ml</a><a
                                                        id="automation-link-from-sub-title-to-prod-item_c1ff81a45d3bf8bcd503c1876f233ee6"
                                                        href="#" class="automation-link-from-sub-title-to-prod sku">Al
                                                    Haramain</a></div>
                                        </div>
                                        <div class="cart-item-middle"><p class="current-price">৳ 358</p>
                                            <p class="origin-price">৳ 575</p>
                                            <p class="promotion-ratio">-38%</p>
                                            <div class="operations"><span class="automation-btn-delete"><span
                                                            class="lazada lazada-ic-Delete lazada-icon icon delete"></span></span>
                                            </div>
                                        </div>
                                        <div class="cart-item-right">
                                            <div class="quantity automation-item-quantity"><span
                                                        class="item-quantity-prefix">Qty: </span><span
                                                        class="item-quantity-value">1</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="rightContainer_10010" class="container" style="width: 388px; float: right;">
                        <div class="voucher-input"><p class="voucher-title">Promotion</p>
                            <div class="voucher-input-inner">
                                <div class="voucher-input-col"><span
                                            class="next-input next-input-single next-input-medium clear voucher-input-control"><input
                                                id="automation-voucher-input"
                                                placeholder="Enter&nbsp;Store/Daraz&nbsp;Code" type="text" height="100%"
                                                value=""></span></div>
                                <div class="voucher-input-col">
                                    <button id="automation-voucher-input-button" type="button"
                                            class="next-btn next-btn-normal next-btn-large voucher-input-button">APPLY
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="additional-info-wrapper" id="additional-info"><p class="additional-info-title">
                                Invoice and Contact Info</p>
                            <p class="additional-info-action">Edit</p></div>
                        <div id="additional-detail" class="additional-detail-wrapper"></div>
                        <div class="summary-section">
                            <div class="summary-section-heading">Order Summary</div>
                            <div class="summary-section-content">
                                <div class="  checkout-summary">
                                    <div class="checkout-summary-rows">
                                        <div class="checkout-summary-row">
                                            <div class="checkout-summary-main">
                                                <div class="checkout-summary-label">Items&nbsp;Total (1 Items)</div>
                                                <div class="checkout-summary-value"><span
                                                            class="checkout-summary-noline-value">৳ 358</span></div>
                                            </div>
                                        </div>
                                        <div class="checkout-summary-row">
                                            <div class="checkout-summary-main">
                                                <div class="checkout-summary-label">Delivery Fee</div>
                                                <div class="checkout-summary-value"><span
                                                            class="checkout-summary-noline-value">৳ 60</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="undefined checkout-order-total">
                            <div class="checkout-order-total-row">
                                <div class="checkout-order-total-title">Total:</div>
                                <div class="checkout-order-total-fee">৳ 418<small class="checkout-order-total-fee-tip">VAT
                                        included, where applicable</small></div>
                            </div>
                            <div style="color: rgb(255, 255, 255); width: 100%; height: 40px; float: right; line-height: 40px; font-size: 14px; margin-left: 12px; background-color: rgb(218, 218, 218); position: relative; display: inline-block; font-style: normal; font-family: inherit; cursor: not-allowed; transition: 0.3s ease-out; box-shadow: none; border-radius: 2px; text-align: center;">
                                Proceed to Pay
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".select2").select2();
        });
    </script>
    <script>
        $("#area").on("change", function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                data: {
                    id: id
                },
                url: "{{ route('shipping.charge') }}",
                dataType: "html",
                success: function (response) {
                    $(".cartlist").html(response);
                },
            });
        });
    </script>
    <script type="text/javascript">
        dataLayer.push({ecommerce: null});  // Clear the previous ecommerce object.
        dataLayer.push({
            event: "view_cart",
            ecommerce: {
                items: [@foreach (Cart::instance('shopping')->content() as $cartInfo){
                    item_name: "{{$cartInfo->name}}",
                    item_id: "{{$cartInfo->id}}",
                    price: "{{$cartInfo->price}}",
                    item_brand: "{{$cartInfo->options->brand}}",
                    item_category: "{{$cartInfo->options->category}}",
                    item_size: "{{$cartInfo->options->size}}",
                    item_color: "{{$cartInfo->options->color}}",
                    currency: "BDT",
                    quantity: {{$cartInfo->qty ?? 0}}
                },@endforeach]
            }
        });
    </script>
    <script type="text/javascript">
        // Clear the previous ecommerce object.
        dataLayer.push({ecommerce: null});

        // Push the begin_checkout event to dataLayer.
        dataLayer.push({
            event: "begin_checkout",
            ecommerce: {
                items: [@foreach (Cart::instance('shopping')->content() as $cartInfo)
                {
                    item_name: "{{$cartInfo->name}}",
                    item_id: "{{$cartInfo->id}}",
                    price: "{{$cartInfo->price}}",
                    item_brand: "{{$cartInfo->options->brands}}",
                    item_category: "{{$cartInfo->options->category}}",
                    item_size: "{{$cartInfo->options->size}}",
                    item_color: "{{$cartInfo->options->color}}",
                    currency: "BDT",
                    quantity: {{$cartInfo->qty ?? 0}}
                },
                    @endforeach]
            }
        });
    </script>
@endpush

















