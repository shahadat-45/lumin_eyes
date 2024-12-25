@extends('frontEnd.layouts.master') @section('title', 'Customer Checkout') @push('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/select2.min.css') }}"/>
    <style>
        .container {
            max-width: 1188px !important;
            margin: auto;
        }

        .card-body, .card {
            border: 0 !important;
        }

        .mod-guest-register-hd {
            font-size: 18px;
            color: #212121;
            margin-bottom: 10px;
            padding: 0px 0px 15px 0px;
        }

        .card-body {

            padding: 38px !important;

        }

        .form-group label {
            font-size: 12px;
            height: 15px;
            line-height: 15px;
            overflow: hidden;
            color: #424242;
            display: block;
            margin-bottom: 5px;
        }

        .package-title-name {
            font-weight: bold;
            margin-right: 37px;
            text-align: left;
            line-height: 16px;
            font-size: 14px;
            color: #202020;
        }

        input::placeholder {
            font-size: 14px;
            color: #999;
        }

        .form-group select option {
            font-size: 14px;
            color: #999;
        }

        .table > :not(caption) > * > * {
            border-bottom: 0;
        }

        .current-price span, .current-price strong {
            font-size: 18px;
            line-height: 28px;
            color: #f57224;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .summary-section-heading {
            font-size: 18px;
            color: #212121;
            margin-bottom: 14px;
            position: relative;
            font-weight: 500;
        }

        .summary-section-content {
            border-bottom: 1px solid #eff0f5;
            padding-bottom: 16px;
        }

        .checkout-summary-row {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 100%;
            margin-bottom: 16px;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .checkout-summary-main {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .checkout-summary-label {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            font-size: 14px;
            color: #757575;
            letter-spacing: 0;
            line-height: 21px;
        }

        .checkout-summary-value {
            font-size: 16px;
            line-height: 21px;
            text-align: right;
            color: #202020;
            letter-spacing: -.44px;
            vertical-align: middle;
        }

        .checkout-summary-noline-value {
            margin-right: 5px;
        }

        .summary-section + .checkout-order-total {
            padding: 14px;
            padding-bottom: 58px;
            background: #fff;
            margin-top: 0;
        }

        .checkout-order-total-row {
            display: table;
            width: 100%;
            margin-bottom: 16px;
        }

        .checkout-order-total-title 
        {
            display: table-cell;
            font-size: 14px;
            color: #202020;
            line-height: 16px;
        }

        .checkout-order-total-fee {
            display: table-cell;
            font-size: 18px;
            color: #f57224;
            text-align: right;
        }

        .checkout-order-total-fee-tip {
            font-size: 12px;
            color: #424242;
            letter-spacing: 0;
            line-height: 16px;
            display: block;
            text-align: right;
            margin-top: 5px;
        }

        .proceed-pay {
            color: rgb(255, 255, 255);
            width: 100%;
            height: 40px;
            float: right;
            line-height: 40px;
            font-size: 14px;
            margin-left: 12px;
            background-color: #f85606;
            position: relative;
            display: inline-block;
            font-style: normal;
            font-family: inherit;
            /*cursor: not-allowed;*/
            transition: 0.3s ease-out;
            box-shadow: none;
            border-radius: 2px;
            text-align: center;
        }


    </style>

@endpush @section('content')
    <section class="chheckout-section">
        @php
            $subtotal = Cart::instance('shopping')->subtotal();
            $subtotal = str_replace(',', '', $subtotal);
            $subtotal = str_replace('.00', '', $subtotal);
            $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-sm-8 cus-order-2">
                    <div class="checkout-shipping">
                        <form action="{{ route('customer.ordersave') }}" method="POST" id="order-save" name="order-save" data-parsley-validate="">
                            @csrf
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mod-guest-register-hd"
                                                 data-spm-anchor-id="a2o42.shipping.0.i3.4b592829XFX9Aq">Delivery
                                                Information
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                {{--                                            <label for="name">আপনার নাম লিখুন *</label>--}}
                                                <label>Full name</label>
                                                <input type="text" id="name"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name"
                                                       value="{{ old('name') }}"
                                                       placeholder="Enter your first and last name"
                                                       required/>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label for="phone">Phone Number</label>
                                                <input type="text" minlength="11" id="number" maxlength="11"
                                                       placeholder="Please enter your phone number"
                                                       pattern="0[0-9]+"
                                                       title="please enter number only and 0 must first character"
                                                       title="Please enter an 11-digit number." id="phone"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone"
                                                       value="{{ old('phone') }}"
                                                       required/>
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- col-end -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label for="address">Email</label>
                                                <input type="email" id="email" placeholder="Please enter your email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email"
                                                       value="{{ old('email') }}"
                                                       required/>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- col-end -->
                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label for="address">Address</label>
                                                <input type="address" id="address"
                                                       placeholder="Please enter your address"
                                                       class="form-control @error('address') is-invalid @enderror"
                                                       name="address" value="{{ old('address') }}"
                                                       required/>
                                                
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong> {{ $message }} </strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--                                    <div class="col-sm-6">--}}
                                        {{--                                        <div class="form-group @error('area') is-invalid @enderror">--}}
                                        {{--                                            <label for="address">Delivery Options</label>--}}
                                        {{--                                            @foreach ($shippingcharge as $key => $value)--}}
                                        {{--                                                <div class="form-check">--}}
                                        {{--                                                    <input--}}
                                        {{--                                                            type="radio"--}}
                                        {{--                                                            id="area-{{ $value->id }}"--}}
                                        {{--                                                            name="area"--}}
                                        {{--                                                            value="{{ $value->id }}"--}}
                                        {{--                                                            class="form-check-input"--}}
                                        {{--                                                            required>--}}
                                        {{--                                                    <label class="form-check-label" for="area-{{ $value->id }}">--}}
                                        {{--                                                        {{ $value->name }}--}}
                                        {{--                                                    </label>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            @endforeach--}}
                                        {{--                                        </div>--}}
                                        {{--                                  </div>--}}


                                        <div class="col-sm-6">
                                            <div class="form-group mb-3">
                                                <label for="area">Delivery Option</label>
                                                <select type="area" id="area"
                                                        class="form-control @error('area') is-invalid @enderror"
                                                        name="area"
                                                        required>
                                                    @foreach ($shippingcharge as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- col-end -->

                                        <!-------------------->
                                        @php
                                        $partialStatus = false;
                                        $partialAmount = 0;
                                            foreach (Cart::instance('shopping')->content() as $key => $item) {
                                                $partialPay = $item->options['partial_pay'] ?? null; // Safely access 'partial_pay'
                                                
                                                if ($partialPay !== null) {
                                                    $partialAmount += $partialPay;
                                                    $partialStatus = true;
                                                } 
                                            }
                                        @endphp                         
                                        <!-- col-end -->
                                        <div class="col-sm-6">

                                            <div class="radio_payment form-group">
                                                <label id="payment_method">Payment Method</label>
                                                <div class="payment_option">                                                    
                                                </div>
                                            </div>
                                            <div class="payment-methods"> 
                                                @if($partialStatus == true)
                                                    <div class="form-check p_bkash">
                                                        <input class="form-check-input" type="radio" name="payment_method"
                                                        id="inlineRadio2" value="bkash" checked/>
                                                        <label class="form-check-label" for="inlineRadio2">
                                                            Bkash
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="form-check p_cash">
                                                        <input class="form-check-input" type="radio" name="payment_method"
                                                        id="inlineRadio1" value="Cash On Delivery" checked />
                                                        <label class="form-check-label" for="inlineRadio1">
                                                            Cash On Delivery
                                                        </label>
                                                    </div>
                                                @endif                                           
                                            </div>
                                        </div>

                                        <!-------------------->
                                        {{--                                    <div class="col-sm-12">--}}
                                        {{--                                        <div class="form-group">--}}
                                        {{--                                            <button class="order_place" type="submit">অর্ডার করুন</button>--}}
                                        {{--                                        </div>--}}
                                        {{--                                    </div>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- card end -->


                        </form>
                    </div>
                </div>
                <!-- col end -->
                <div class="col-sm-4 cust-order-1">
                    <div class="cart_details table-responsive-sm">
                        <div class="card">
                            {{--                        <div class="card-header">--}}
                            {{--                            <h5>অর্ডারের তথ্য</h5>--}}
                            {{--                        </div>--}}
                            <div class="card-body">
                                <div class="summary-section summery-sec">
                                    <div class="summary-section-heading">
                                        Order Summary
                                    </div>
                                    <div class="summary-section-content">
                                        <div class="  checkout-summary">
                                            <div class="checkout-summary-rows">
                                                <div class="checkout-summary-row">
                                                    <div class="checkout-summary-main">
                                                        <div class="checkout-summary-label">Items&nbsp;Total (1 Items)
                                                        </div>
                                                        <div class="checkout-summary-value"><span
                                                                    class="checkout-summary-noline-value">৳ {{ $subtotal }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="checkout-summary-row">
                                                    <div class="checkout-summary-main">
                                                        <div class="checkout-summary-label">Delivery Fee</div>
                                                        <div class="checkout-summary-value"><span
                                                                    class="checkout-summary-noline-value">৳ {{ $shipping }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="checkout-summary-row">
                                                    <div class="checkout-summary-main">
                                                        <div class="checkout-summary-label">Discount (-) </div>
                                                        <div class="checkout-summary-value"><span
                                                                    class="checkout-summary-noline-value" id="discount">৳ 0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="undefined checkout-order-total">
                                        <div class="checkout-order-total-row">
                                            <div class="checkout-order-total-title">Total:</div>
                                            <div class="checkout-order-total-fee">৳ <span id="total">{{ $subtotal + $shipping }}</span><small
                                                        class="checkout-order-total-fee-tip">VAT included, where
                                                    applicable</small></div>
                                        </div>
                                        <button id="order-save" form="order-save" type="submit" class="proceed-pay">
                                            Proceed to Pay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body p-3 position-relative">
                             <input type="text" class="p-2 mb-2" placeholder="Enter Your Coupon" id="coupon" style="width: 100%; border: 1px solid #f5f5f5">
                             <input type="hidden" id="hidden_coupon" value="0">
                            <button class="btn btn-dark position-absolute px-4" id="applyCoupon" style="right: 18px;top: 16px">Apply</button>
                            <strong id="error"></strong>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 cust-order-1 mt-3">
                    <div class="cart_details table-responsive-sm">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="package-title-name">Packages</div>
                                <div class="">Shipped By <span
                                            class="package-title-name">{{$generalsetting->name}}</span></div>
                            </div>
                            <div class="card-body cartlist">
                                <table class="table  text-center mb-0" style="border: 0!important;">
                                    <thead>
                                    <tr>
                                        <th style="width: 30%;"></th>
                                        <th style="width: 30%;"></th>
                                        <th style="width: 20%;"></th>
                                        <th style="width: 20%;"></th>
                                    </tr>
                                    </thead>

                                    <tbody>                                        
                                    @foreach (Cart::instance('shopping')->content() as $value)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($value->options->image) }}"/>
                                            </td>
                                            {{--                                            <td>--}}
                                            {{--                                                <a class="cart_remove" data-id="{{ $value->rowId }}"><i--}}
                                            {{--                                                        class="fas fa-trash text-danger"></i></a>--}}
                                            {{--                                            </td>--}}
                                            <td class="text-left">
                                                <a class="pro-title"
                                                   href="{{ route('product', $value->options->slug) }}">
                                                    {{ Str::limit($value->name, 20) }}</a>
                                                @if ($value->options->product_size)
                                                    <p>Size: {{ $value->options->product_size }}</p>
                                                @endif
                                                @if ($value->options->product_color)
                                                    <p>Color: {{ $value->options->product_color }}</p>
                                                @endif
                                            </td>
                                            {{--                                            <td class="cart_qty">--}}
                                            {{--                                                <div class="qty-cart vcart-qty">--}}
                                            {{--                                                    <div class="quantity">--}}
                                            {{--                                                        <button class="minus cart_decrement"--}}
                                            {{--                                                            data-id="{{ $value->rowId }}">-</button>--}}
                                            {{--                                                        <input type="text" value="{{ $value->qty }}" readonly />--}}
                                            {{--                                                        <button class="plus cart_increment"--}}
                                            {{--                                                            data-id="{{ $value->rowId }}">+</button>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </td>--}}
                                            <td>
                                                <div class="current-price"><span
                                                            class="alinur">৳ </span><strong>{{ $value->price }}</strong>
                                                </div>
                                                <span class="p-1 cart_remove" data-id="{{ $value->rowId }}"><i
                                                            class="fas fa-trash text-danger"></i></span>
                                            </td>

                                            <td><span class="alinur">Qty: </span>{{ $value->qty }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{--                                <tfoot>--}}
                                    {{--                                    <tr>--}}
                                    {{--                                        <th colspan="3" class="text-end px-4">মোট</th>--}}
                                    {{--                                        <td class="px-4">--}}
                                    {{--                                            <span id="net_total"><span class="alinur">৳--}}
                                    {{--                                                </span><strong>{{ $subtotal }}</strong></span>--}}
                                    {{--                                        </td>--}}
                                    {{--                                    </tr>--}}
                                    {{--                                    <tr>--}}
                                    {{--                                        <th colspan="3" class="text-end px-4">ডেলিভারি চার্জ</th>--}}
                                    {{--                                        <td class="px-4">--}}
                                    {{--                                            <span id="cart_shipping_cost"><span class="alinur">৳--}}
                                    {{--                                                </span><strong>{{ $shipping }}</strong></span>--}}
                                    {{--                                        </td>--}}
                                    {{--                                    </tr>--}}
                                    {{--                                    <tr>--}}
                                    {{--                                        <th colspan="3" class="text-end px-4">সর্বমোট</th>--}}
                                    {{--                                        <td class="px-4">--}}
                                    {{--                                            <span id="grand_total"><span class="alinur">৳--}}
                                    {{--                                                </span><strong>{{ $subtotal + $shipping }}</strong></span>--}}
                                    {{--                                        </td>--}}
                                    {{--                                    </tr>--}}
                                    {{--                                </tfoot>--}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <!-- col end -->--}}
            </div>
        </div>
    </section>
@endsection @push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/select2.min.js"></script>
    <script>
        $('#applyCoupon').on('click', function () {
            var couponCode = $('#coupon').val();
    
            if (!couponCode) {
                $('#error').html('Please enter a coupon code!');
                return;
            }
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                url: '{{ route('coupon.apply') }}',
                type: 'POST',
                data: {
                    coupon: couponCode,
                    amount: Number("<?php echo $subtotal?>"),
                },
                success: function (response) {
                    var shipping = {{ $shipping }};
                    if (response.success == true) {
                        $('#discount').html( '৳ ' + response.discount);
                        $('#hidden_coupon').val(response.discount);
                        $('#total').html(parseInt(response.amount) + parseInt(shipping));
                        $('#error').html(response.message).css({ 'color': 'green', });
                    } else {
                        $('#error').html(response.message).css({ 'color': 'red', }); // Clear error message if there's none
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    $('#error').html(error);
                }
            });
        });
    </script>
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
                    id: id,
                    discount: $('#hidden_coupon').val(),
                },
                url: "{{ route('shipping.charge') }}",
                dataType: "html",
                success: function (response) {
                    $(".summery-sec").html(response);
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
