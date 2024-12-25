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
@section('title','Page')
@section('content')

<section class="comn_sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cmn_menu">
                    <ul>
                        @foreach($cmnmenu as $key=>$value)
                        <li>
                            <a href="{{route('page',$value->slug)}}">{{$value->name}}</a>
                        </li>
                        @endforeach
                        <li>
                            <a href="{{route('contact')}}">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="createpage-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-content">
                    {{-- <div class="page-title mb-2">
                        <h5>{{$page->title}}</h5>
                    </div> --}}
                    <div class="page-description">
                        {!! $page->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if ($page->slug == 'contact')
<section>
    @include('frontEnd.layouts.include.contact')
</section>    
@endif
@endsection
