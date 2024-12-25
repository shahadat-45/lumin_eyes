@extends('frontEnd.layouts.master')
@section('title', 'Home') @push('seo')
    <meta name="app-url" content=""/>
    <meta name="robots" content="index, follow"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <!-- Open Graph data -->
    <meta property="og:title" content=""/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content="{{ asset($generalsetting->white_logo) }}"/>
    <meta property="og:description" content=""/>
@endpush @push('css')
    
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/owl.theme.default.min.css') }}"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css" rel="stylesheet"/>

    <style>
        .picture-wrapper:hover .sidebar , .pro-img-wrapper:hover .sidebar{
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

@endpush @section('content')
    <section class="slider-section" id="slider-sm-screen">
        <div class="banner-container">
            <div class="row" id="slider-row">

                {{-- Slider Start--}}
                <div class="col-12">
                    <div class="home-slider-container">
                        <div class="main_slider owl-carousel">
                            @foreach ($sliders as $key => $value)
                                <div class="slider-item">
                                    <img src="{{ asset($value->image) }}" class="img-fluid"  style="border-radius: 10px" alt=""/>
                                </div>
                                <!-- slider item -->
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Slider End--}}

            </div>
        </div>
    </section>
    <!-- slider end -->

    
    {{--  Banner Start--}}
    @if(isset($adBanners))
        <section class="" id="adBanner">
            <a href="{{$adBanners->link}}">
            <div class="banner-container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="rounded" src="{{asset($adBanners->image)}}" style="height: 180px; width: 100%">
                    </div>
                </div>
            </div>
            </a>
        </section>
    @endif
    {{--  Banner End--}}

    {{-- Flash Sale Start   --}}
    @if(count($flashProducts)>0) 
    <section class="banner-container mt-3">
        <h4 class="sec-headline mb-2 mt-4">Flash Sale</h4>
        <div class="banner-container" style="background-color: #fff">


            <div class="row vw-sm-100">

                <div class="col-12 py-2 d-flex justify-content-between align-items-center">
                    <div class="card-header px-3 py-1">
                        <span>On Sale Now</span>

                    </div>

                    <div>
                        <a href="{{route('allproducts')}}" class="btn btn-outline-danger">Shop All Products</a>
                    </div>
                </div>


            </div>

            <hr>

            <div class="row vw-sm-100" style="padding-bottom: 15px; margin-left: 0;">
                
                @forelse($flashProducts as $key => $value) 
                <div class="col-6 col-md-2 pro-hover" style="padding-left: 0;">
                    <div class="pro-img-wrapper position-relative " style="overflow: hidden">
                        <div class="sidebar">
                            <ul>
                                <li onclick="addTowishlist('{{ $value->id }}')"><i class="fa-regular fa-heart"></i></li>
                                <li onclick="window.location.href='{{route('product',$value->slug)}}'"><i class="fa-regular fa-eye"></i></li>
                                <li onclick="addToCompare('{{ $value->id }}')"><i class="fa-solid fa-chart-simple"></i></li>
                                <li onclick="addToCartAjax('{{ $value->id }}')"><i class="fa-solid fa-cart-plus"></i></li>
                            </ul>
                        </div>
                        <a href="{{route('product',$value->slug)}}"><img src="{{asset($value->image->image)}}" style="object-fit:cover" tabindex="-1"></a>
                    </div>
                    <div class="pro-details">
                        <div class="pro-title">
                            <p>{{$value->name}}</p>
                        </div>

                        <div class="pro-price">
                            <span class="currency">৳</span>
                            <span class="price">{{$value->new_price}}</span>

                        </div>

                        <div class="fs-card-origin-price mb-2">
                            <div class="fs-origin-price">
                                <span class="currency">৳</span>
                                <span class="price">{{$value->old_price}}</span>
                            </div>

                            <span class="itemDiscount">-{{ round((($value->old_price- $value->new_price)/$value->old_price) * 100)}}%</span>
                        </div>
                    </div>

                </div>
                @empty
                @endforelse

            </div>
        </div>


    </section>
    @endif
    {{-- Flash Sale Start   --}}

    {{--Top Categories Start--}}
    @if(count($featuredCategories)>0) 
    <div class="pc-custom-link hp-mod-card card-categories-comp-container"
         id="js_categories">
        <div class="hp-mod-card-header">
            <p class="hp-mod-card-title mb-1 sec-headline">
                Categories</p></div>
        <div class="p-mod-card-content">
            
            <div class="card-categories-ul">
                @forelse($featuredCategories as $key => $value) 
                <div class="card-categories-li hp-mod-card-hover">
                    <a class="pc-custom-link card-categories-li-content" href="{{ route('category', $value->slug) }}">
                        <div class="picture-wrapper common-img card-categories-image img-w100p">
                            <img src="{{$value->image}}" style="object-fit:cover"></div>
                        <div class="card-categories-name"><p class="text two-line-clamp">{{$value->name}}</p></div>
                    </a>
                </div>
                @empty
                @endforelse
            </div>
            </div>
        </div>
    @endif
    {{--Top Categories End--}}

    {{-- Just For You Start  --}}
    <div class="pc-custom-link hp-mod-card jfy-comp-container">
        <div class="hp-mod-card-header"><span class="hp-mod-card-title sec-headline">Just For You</span>
        </div>
        <div class="hp-mod-card-content">
            <div class="card-jfy-wrapper">
                @forelse($forYouProducts as $key => $value) 
                <a class="pc-custom-link jfy-item hp-mod-card-hover fade-effect"  fade-direction="left" fade-time="1">
                    <div class="picture-wrapper common-img jfy-item-image img-w100p position-relative" >
                        
                        <img src="{{asset($value->image->image)}}" style="object-fit: cover;" onclick="window.location.href='{{ route('product', $value->slug) }}'" >
                        
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
    {{-- Just For You End   --}}
             
@endsection @push('script')
    <script src="{{ asset('public/frontEnd/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontEnd/js/jquery.syotimer.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".main_slider").owlCarousel({
                items: 1,
                loop: true,
                dots: false,
                autoplay: true,
                nav: true,
                autoplayHoverPause: false,
                margin: 0,
                mouseDrag: true,
                smartSpeed: 1500,
                autoplayTimeout: 3000,

                navText: ["<i class='fa-solid fa-angle-left'></i>",
                    "<i class='fa-solid fa-angle-right'></i>"
                ],
            });
        });
    </script>
 
   

@endpush
