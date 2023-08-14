@extends('index')
@section('title')
    Home
@endsection

@section('main_content')
    <div class="home-cont flex-col">
        <div class="name">
        </div>
        <div class="banner d-flex">
            <img src="{{ asset('images/home0.jpg') }}" class="fill" alt="">
        </div>
        @for ($k = 0; $k < 4; $k++)
            <div class="info d-flex wrap">
                <h2 class="header text-center w-100">This is header</h2>
                <div class="d-flex wrap">
                    <div class="img">
                        <img src="{{ asset('images/home0.jpg') }}" class="fill" alt="">
                    </div>
                    <div class="text flex-col j-sa">
                        <h2>The Header{{ $k }}</h2>
                        <p>
                            This is the place holser of the text that we do need from
                            This is the place holser of the text that we do need from
                            This is the place holser of the text that we do need from
                            This is the place holser of the text that we do need from
                            This is the place holser of the text that we do need from
                        </p>
                        <span>This will act as the footer</span>
                    </div>
                </div>
            </div>
        @endfor
        <div class="carousel ">
            <div class="imgs d-flex j-sb">
                <img src="{{ asset('images/home0.jpg') }}" class="fill" alt="">
                <img src="{{ asset('images/home1.jpg') }}" class="fill" alt="">
                <img src="{{ asset('images/home2.jpg') }}" class="fill" alt="">
            </div>
            <div class="carousel-btns center-content">
                <button>
                    < </button>
                        <button>></button>
            </div>
        </div>
    </div>
@endsection
<script type="module" src="/js/home.js"></script>
