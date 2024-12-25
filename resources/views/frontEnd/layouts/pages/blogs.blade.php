@extends('frontEnd.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/blogs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontEnd/blogs/responsive.css') }}">
<style>
#content {
    background: white;
}
nav.flex.items-center.justify-between {
    display: flex;
    margin-top: 25px;

    & div:first-child{
        display: none;
    }
    & div:last-child{
        display: flex;
        justify-content: space-between;
        width: 100%;
    }
}
/* Base styles for form controls */
.form_contril,
.textarea::placeholder {
    font-size: 15px;
}

/* Error styles */
.error-input {
    border-bottom: 1px solid red !important; /* Red border */
    color: red !important; /* Red text */
}

.error-input::placeholder {
    color: red !important; /* Red placeholder text */
}
</style>

@endpush 
@section('content')
     <!-- blog_main -->
     <div class="blog_main">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2>Our Blogs</h2>
                    <span>It is a long established fact that a reader will be distracted by the readable content of a page </span>
                 </div>
              </div>
           </div>
           <!-- fist section -->
           {{-- <div class="row">
              <div class="col-md-12">
                 <div class="our_two_box">
                    <div class="row d_flex">
                      
                          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                          <div class="our_img">
                             <figure><img src="{{ asset('public/frontEnd/blogs/images/our_img1.jpg') }}" alt="#"/></figure>
                          </div>
                       </div>
                       <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                          <div class="our_text_box">
                             <h3 class="awesome pa_wi">The biggest and most awesome Photo of  year</h3>
                             <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model </p>
                             <div class="post_box padding_bottom1">
                                <h5 class="flot_left1">Post By : Blogger </h5>
                                <ul class="like">
                                   <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/like.png') }}" alt="#"/>Like</a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/comm.png') }}" alt="#"/>Comment</a></li>
                                </ul>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div> --}}
   <!-- end fist section -->
   <!-- secend section -->
           <div class="row">
              <div class="col-md-12">
                 <div class="our_two_box">
                    <div class="row">
                       <div class="col-md-12">
                          <div class="our_img">
                             <figure><a href="{{ route('single_blog' , $blogs->first()->id) }}"><img class="he_img" src="{{ $blogs->first()->b_image }}" alt="#"/></a></figure>                                                 
                          <div class="our_text_box position_box">
                            <a href="{{ route('single_blog' , $blogs->first()->id) }}"><h3 class="awesome withi_color">{{ $blogs->first()->b_title }}</h3></a>
                             <p class="hiuouh">{{ $blogs->first()->b_short_des }}</p>
                             <div class="post_box">
                                <h5 class="flot_left1 withi_color">Post By : Author </h5>
                                <ul class="like withi_color">
                                   <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/like1.png') }}" alt="#"/>Like</a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/comm1.png') }}" alt="#"/>Comment</a></li>
                                </ul>
                             </div>
                          </div>
                       </div>
                       
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!-- end secend section -->

            <!-- three section -->
            <div class="row">
                @foreach ($blogs->slice(1, 2)->values() as $blog)
                <div class="col-md-6 padding_bottom2">
                    <div class="our_img">
                        <figure><a href="{{ route('single_blog' , $blog->id) }}"><img src="{{ asset($blog->b_image) }}" alt="#"/></a></figure>
                    </div>
                    <div class="our_text_box three_box">
                        
                        
                        <div class="post_box d_flex padding_top3">
                        <a href="{{ route('single_blog' , $blog->id) }}"><h3 class="awesome padding_flot">{{ $blog->b_title }}</h3></a>
                        <h6 class="flot_left1">Post By : Author </h6>
                        <ul class="like padding_left2">
                            <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/like.png') }}" alt="#"/>Like</a></li>
                            <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/comm.png') }}" alt="#"/>Comment</a></li>
                        </ul>
                        </div>
                        <p>{{ $blog->b_short_des }}</p>
                    </div>
                </div>
                @endforeach
            </div>
                
    
   <!-- end three section -->
  
            <!-- for section -->
           <div class="row">
            @foreach ($blogs->slice(3)->values() as $i => $blog)
            <div class="col-md-12">
               <div class="our_two_box magna_top90 mb-0">
                  <div class="row d_flex">
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 {{ $i % 2 == 0 ? 'order-1' : '' }} ">
                        <div class="our_img">
                           <figure><a href="{{ route('single_blog' , $blog->id) }}"><img src="{{ asset($blog->b_image) }}" alt="#"/></a></figure>
                        </div>
                     </div>
                     <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="our_text_box left">
                            <a href="{{ route('single_blog' , $blog->id) }}"><h3 class="awesome pa_wi">{{ $blog->b_title }}</h3></a>
                           <p>{{ $blog->b_short_des }}</p>
                           <div class="post_box padding_bottom1">
                              <h5 class="flot_left1">Post By : Author </h5>
                              <ul class="like">
                                 <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/like.png') }}" alt="#"/>Like</a></li>
                                  <li><a href="#"><img src="{{ asset('public/frontEnd/blogs/images/comm.png') }}" alt="#"/>Comment</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
           </div>
           {{ $blogs->links() }}
   <!-- end for section -->


        </div>
     </div>
     <!-- end blog_main -->
   
     <!-- Testimonial -->
     {{-- <div class="section">
       
           <div id="" class="Testimonial" style="background: url('{{ asset('public/frontEnd/blogs/images/test_bg.jpg') }}')">
               <div class="container">
              <div class="row">
                 <div class="col-md-6 offset-md-3">
                    <div class="titlepage">
                       <h2>Testimonial</h2>
                    </div>
                 </div>
              </div>
              <div class="row d_flex">
                 <div class="col-md-3">
                    <div class="Testimonial_box">
                       <i><img src="{{ asset('public/frontEnd/blogs/images/plan1.png') }}" alt="#"/></i>
                    </div>
                 </div>
                 <div class="col-md-9">
                    <div class="Testimonial_box">
                       <h4>will smithe</h4>
                       <p>Tof Lorem Ipsum, you need to be There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a pass
                       <br>
                       age of Lorem Ipsum, you need to be
                       </p>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div> --}}
    
     <!-- end Testimonial -->
     <!-- contact -->
     @include('frontEnd.layouts.include.contact')
     <!-- end contact --> 
@endsection