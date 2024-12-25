<style>

    .nav-link
    {
        font-size: 16px;
    }

    .cart-num.daraz-pc-theme-style {
        background: #fff !important;
        border: 3px solid #f85606 !important;
        color: #f85606 !important;
        font-size: 9px !important;
    }
    .header-list-items ul li span {
        position: absolute;
        top: -3px;
        right: -5px;
        background: #f85606;
        color: #fff;
        height: 16px;
        width: 17px;
        line-height: 13px;
        font-size: 10px;
        border-radius: 50px;
    }
    .wishlist svg{
        height: 26px;
        width: 26px;
    }
</style>

@php $subtotal = Cart::instance('shopping')->subtotal(); @endphp

{{--Mobile Menu--}}
<div class="mobile-menu">
    <div class="mobile-menu-logo">
        <div class="logo-image">
            <img src="{{asset($generalsetting->white_logo)}}" alt="" />
        </div>
        <div class="mobile-menu-close">
            <i class="fa fa-times"></i>
        </div>
    </div>
    <ul class="first-nav">
        @foreach($menucategories as $scategory)
            <li class="parent-category">
                <a href="{{url('category/'.$scategory->slug)}}" class="menu-category-name">
                    <img src="{{asset($scategory->image)}}" alt="" class="side_cat_img" />
                    {{$scategory->name}}
                </a>
                @if($scategory->subcategories->count() > 0)
                    <span class="menu-category-toggle">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                @endif
                <ul class="second-nav" style="display: none;">
                    @foreach($scategory->subcategories as $subcategory)
                        <li class="parent-subcategory">
                            <a href="{{url('subcategory/'.$subcategory->slug)}}" class="menu-subcategory-name">{{$subcategory->subcategoryName}}</a>
                            @if($subcategory->childcategories->count() > 0)
                                <span class="menu-subcategory-toggle"><i class="fa fa-chevron-down"></i></span>
                            @endif
                            <ul class="third-nav" style="display: none;">
                                @foreach($subcategory->childcategories as $childcat)
                                    <li class="childcategory"><a href="{{url('products/'.$childcat->slug)}}" class="menu-childcategory-name">{{$childcat->childcategoryName}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
</div>



{{--Desktop Header--}}
<header id="navbar_top">
{{--    Marquee Text--}}
    <div class="topHeader">
        <div class="banner-container">
            <div class="d-flex  justify-content-end gap-4 text-decoration-none text-uppercase top-nav">
                <a href="{{url('page/contact')}}"> <span class="top-nav-text">Contact</span> </a>
                <a href="{{url('page/about')}}"> <span class="top-nav-text">About Us</span> </a>
                <a href="{{ route('blogs') }}"> <span class="top-nav-text">Blogs</span> </a>
                <a href="{{ route('compare') }}"> <span class="top-nav-text">Compare</span> </a>
                <a href="{{url('page/delivery-rules')}}"> <span class="top-nav-text">Delivery Rules</span> </a>
                @guest('customer')
                    <a href="{{url('customer/login')}}"> <span class="top-nav-text">Login</span> </a>
                    <a href="{{url('customer/register')}}"> <span class="top-nav-text">Register</span> </a>
                @endguest
                
                @auth('customer')
                <a href="{{url('customer/account')}}"> <span class="top-nav-text">Account</span> </a>
                    <form action="{{url('customer/logout')}}" method="POST" name="customerLogout">
                        @csrf
                        <button type="submit" class="logoutbtn top-nav-text" name="customerLogout">Log Out </button>
                    </form>
                
                @endauth

              
            </div>
        </div>
    </div>

    <div class="mobile-search pt-3">
        <form action="{{route('search')}}">
            <input type="text" placeholder="Search Product ... " value="" class="msearch_keyword msearch_click" name="keyword" />
            <button><i data-feather="search"></i></button>
        </form>
        <div class="search_result"></div>
    </div>



    <div class="main-header" id="mainHeader">
        <!-- header to end -->
        <div class="logo-area">
            <div class="container" style="padding: 0 6rem 0 6rem">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo-header">
                            <div class="main-logo">
                                <a href="{{route('home')}}"><img src="{{asset($generalsetting->white_logo)}}" alt="" /></a>
                            </div>
                            <div class="main-search d-none" id="nav-item">
                                <nav class="navbar navbar-expand-lg">
                                    <div class="container-fluid">
                                        
                                        <div class="collapse navbar-collapse" id="navbarNav">
                                            <ul class="navbar-nav gap-2">
                                                
                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect  @if(Request::is('/')) active text-decoration-underline  @endif" aria-current="page" href="{{route('home')}}">Home</a>
                                                </li>


                                                <li class="nav-item dropdown">
                                                    <a class="nav-link underline-hover-effect dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Products
                                                    </a>
                                                    <div class="dropdown-menu w-100 mt-0 p-3" aria-labelledby="navbarDropdown" style="
                                                            
                                                            right: 800px!important;
                                                            width: 800px!important;
                                                            border-top-left-radius: 0;
                                                            border-top-right-radius: 0;">
                                                        <div class="container">
                                                            <div class="row my-4">
                                                                
                                                                @forelse($menucategories->take(4) as $key => $category) 
                                                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                                                    <div class="list-group list-group-flush">
                                                                        <a href="{{route('category', $category->slug)}}" class="list-group-item list-group-item-action fw-semibold">{{$category->name}}</a>
                                                                        @forelse($category->subcategories->take(6) as $subcategory)
                                                                        <a href="{{route('subcategory', $subcategory->slug)}}" class="list-group-item list-group-item-action">{{$subcategory->subcategoryName}}</a>
                                                                            
                                                                        @empty
                                                                        @endforelse
                                                                      
                                                                    </div>
                                                                </div>
                                                                @empty
                                                                @endforelse
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                                
                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect @if(Request::is('page/contact')) active text-decoration-underline  @endif" href="{{route('page','contact')}}">Contact</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect @if(Request::is('page/about')) active text-decoration-underline  @endif" href="{{route('page','about')}}">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link underline-hover-effect @if(Request::is('best-selling')) active text-decoration-underline  @endif" href="{{route('bestselling')}}">Best Selling</a>
                                                </li>
                                                
                                                
                                                
                                                
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                               
                            </div>
                            
                            <div class="main-search" id="pro-search-form">
                                <form action="{{route('search')}}">
                                    <input type="text" placeholder="Search Product" class="search_keyword search_click" name="keyword" />
                                    <button>
                                        <i data-feather="search"></i>
                                    </button>
                                </form>
                                <div class="search_result"></div>
                            </div>
                            <div class="header-list-items">
                                <ul>                                    
                                    <li class="cart-dialog cart-toggle cursor-pointer" id="cart-qty">
                                        <p class="margin-shopping" id="shoppingIcon">
                                            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" data-spm-anchor-id="a2a0e.tm80335411.dcart.i0.237f79e0c9Et0l">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.51345 5H1.33325V3H6.15306L7.21972 8.33333H30.5315L27.5012 25H8.51345L4.51345 5ZM7.61972 10.3333L10.1531 23H25.832L28.135 10.3333H7.61972Z" fill="white"></path>
                                                <path d="M11.9999 28C11.9999 28.7364 11.403 29.3333 10.6666 29.3333C9.93021 29.3333 9.33325 28.7364 9.33325 28C9.33325 27.2636 9.93021 26.6667 10.6666 26.6667C11.403 26.6667 11.9999 27.2636 11.9999 28Z" fill="white"></path>
                                                <path d="M25.3333 29.3333C26.0696 29.3333 26.6666 28.7364 26.6666 28C26.6666 27.2636 26.0696 26.6667 25.3333 26.6667C24.5969 26.6667 23.9999 27.2636 23.9999 28C23.9999 28.7364 24.5969 29.3333 25.3333 29.3333Z" fill="white"></path>
                                            </svg>
                                            <span class="cart-num daraz-pc-theme-style" id="topActionCartNumber" style="display: block;"></span>  
                                          </p>
                                    </li>
                                    <li class="wishlist d-flex align-items-center position-relative">
                                        <a href="{{ route('wishlist') }}"><i color="white" class="fa-regular fa-heart"></i></a>
                                        <span class="cart-num daraz-pc-theme-style" id="wishlistCount" style="display: block;">{{Cart::instance('wishlist')->count()}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    
    
    
    <!-- main-header end -->
</header>




{{--Cart Box--}}

<div class="cart-menu  shadow-sm" style="background:white">
    <div class="mobile-menu-logo">

        <div class="logo-image">
            <h3 class="card-title">Shopping Cart <span class="count"></span></h3>
        </div>

        <div class="mobile-menu-close">
            <i class="fa fa-times" style="font-size:18px"></i>
        </div>

    </div>


    <div class="cart-item-list">
        
        {{-- @if(Cart::instance('shopping')->content()->count() == 0)
            <div class="text-center p-3">
            <h3 class="cart__empty-text">Your Cart is Empty</h3>
            <button class="btn btn-success mt-4 continue-shop-btn">Continue Shopping</button>
            <p class="cart__login-title h4 text-center mt-3">Have an account?</p>
                
            <p class="cart__login-paragraph text-center h5">
                <a href="{{route('customer.login')}}" class="text-decoration-underline">Log in</a> to check out faster.
            </p>
            </div>
        @endif --}}
       
    </div>

    {{-- @if(Cart::instance('shopping')->content()->count() == 0)
    @else --}}
    <div class="cart-buttons">
        {{-- <div class="cart-price">
            <p>{{Cart::instance('shopping')->count()}} Product</p>
            <span>{{$subtotal}}</span>
        </div>

        <div class="text-center">
            <a href="{{route('customer.checkout')}}" class="btns default_btn mb-2 f-w d-block btn btn-danger">Checkout</a>
        </div> --}}
    </div>
    {{-- @endif --}}
</div>