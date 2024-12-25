@extends('frontEnd.layouts.master')
@section('title','All Products')
@push('css')
    <link rel="stylesheet" href="{{asset('public/frontEnd/css/jquery-ui.css')}}" />
    <style>
        .pro_img.position-relative:hover .sidebar{
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
    <section class="product-section">
        <div class="container">
            <div class="sorting-section">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="category-breadcrumb d-flex align-items-center">
                            <a href="{{ route('home') }}">Home</a>
                            <span>/</span>
                            <strong>All Products</strong>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="showing-data">--}}
{{--                                    <span>Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} Results</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-sm-6">
                                <div class="mobile-filter-toggle">
                                    <i class="fa fa-list-ul"></i><span>filter</span>
                                </div>
                                <div class="page-sort">
                                    <form action="" class="sort-form">
                                        <select name="sort" class="form-control form-select sort">
                                            <option value="1" @if(request()->get('sort')==1)selected @endif>Product: Latest</option>
                                            <option value="2" @if(request()->get('sort')==2)selected @endif>Product: Oldest</option>
                                            <option value="3" @if(request()->get('sort')==3)selected @endif>Price: High To Low</option>
                                            <option value="4" @if(request()->get('sort')==4)selected @endif>Price: Low To High</option>
                                            <option value="5" @if(request()->get('sort')==5)selected @endif>Name: A-Z</option>
                                            <option value="6" @if(request()->get('sort')==6)selected @endif>Name: Z-A</option>
                                        </select>
                                        <input type="hidden" name="min_price" value="{{request()->get('min_price')}}" />
                                        <input type="hidden" name="max_price" value="{{request()->get('max_price')}}" />
                                    </form>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-12">
                        <div class="row" style="column-gap: 0; row-gap: 5rem;">
                            @foreach ($products as $key => $value)
                                <div class="col-6 col-sm-6 col-md-3 col-lg-3 col-xl-3 fade-effect"   fade-direction="left" fade-time="1">
                                    <div class="pro_img position-relative">
                                        @if(count($value->images) > 1)
                                            <a href="{{route('product',$value->slug)}}">
                                                <img class="pro-slider-img{{$value->id}}" src="{{asset($value->images->get(1)->image)}}" hidden="">
                                            </a>
                                        @endif
                                            <img class="pro-img pro-img{{$value->id}}" onmouseout="reset_img({{$value->id}})" onmouseover="pro_img({{$value->id}})" src="{{ asset($value->image->image) }}" alt=""/>
                                            <div class="sidebar">
                                                <ul>
                                                    <li onclick="addTowishlist('{{ $value->id }}')"><i class="fa-regular fa-heart"></i></li>
                                                    <li onclick="window.location.href='{{route('product',$value->slug)}}'"><i class="fa-regular fa-eye"></i></li>
                                                    <li onclick="addToCompare('{{ $value->id }}')"><i class="fa-solid fa-chart-simple"></i></li>
                                                    <li onclick="addToCartAjax('{{ $value->id }}')"><i class="fa-solid fa-cart-plus"></i></li>
                                                </ul>
                                            </div>

                                        </div>

                                        <div class="pro_content">
                                            <p class="text-center my-2 pro-title">{{ $value->name }}</p>
                                            <p class="text-center my-2 d-flex justify-content-center align-items-center gap-2">
                                                <span class="text-decoration-line-through pro-old-price">{{$value->old_price}}Tk</span>
                                                <span class="pro-title">{{ $value->new_price }}Tk</span>
                                            </p>
                                        </div>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_paginate">
                        {{$products->links('pagination::bootstrap-4')}}

                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push('script')
    <script>
        $(".sort").change(function(){
            $('#loading').show();
            $(".sort-form").submit();
        })
    </script>
@endpush