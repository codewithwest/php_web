@extends('index')
@section('title')
    Home
@endsection

@section('main_content')
@if (Session::has('success'))
<div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
    <div class="alert-success m-auto fw-bold ">
        {{ Session::get('success') }}
    </div>
</div>
<script>
    setTimeout(() => document.querySelector('.alert-success-cont').style.display = "none", 3500)
</script>

@endif
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <h1 class="text-center" style="margin-bottom: 30px;">Welcome to Buddies<h1>
    <div class="home-cont flex-col">
        <div class="name">
        </div>
        <div class="banner d-flex">
            <img src="{{ asset('images/home0.jpg') }}" class="fill" alt="">
        </div>
        {{--  Info Divs --}}
            <div class="info d-flex wrap">
                <h4 class="header text-center w-100" style="margin: 30px;">WHY BE A BUDDY?</h4>
                <div class="d-flex wrap">
                    <div class="img">
                        <img src="{{ asset('images/home0.jpg') }}" class="fill" alt="">
                    </div>
                    <div class="text flex-col j-sa">
                        <p>
                            We have heard of mentor, teachers, leaders all of them
                            be contributing to your growth and they have done amazing,
                            we are here to tell you we have one better, A better is the
                            all in one with an extra source of friendship support and
                            extended family.
                        </p>
                        <span >WHAT YOU CONTRIBUTE</span>
                    </div>
                </div>
            </div>
            <div class="info d-flex wrap">
                <h4 class="header text-center w-100" style="margin: 30px;">A BUDDY?</h4>
                <div class="d-flex wrap">
                    <div class="img">
                        <img src="{{ asset('images/home0.jpg') }}" class="fill" alt="">
                    </div>
                    <div class="text flex-col j-sa">
                        <p>
                            Want to touch not only their mind and but win their hearts,
                             Be a buddy to one, two, three and many as you want,
                             but remember we can change the world but changing one heart,
                            one mind and ones life, Join us today.
                        </p>
                        <span class="text-center">BE WHO YOU NEEDED WHEN YOU WHERE YOUNG</span>
                    </div>
                </div>
            </div>
            <br>
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
    <h2 class="text-center" style="margin-bottom: 30px;">DO YOURSELF A FAVOR, BE A BUDDY</h2>

@endsection
<script type="module" src="/js/home.js"></script>
