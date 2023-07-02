@extends('main')
@section('content')
    <div class="home-cont">
        {{-- Carousel cont --}}
        <div class="carousel-cont">
            <img src="{{ asset('images/index/0.jpg') }}" alt="" class="pos-abs ">
            <button class="btn-left">
                <p>
                    < </p>
            </button>
            <button class="btn-right">
                <p>></p>
            </button>
        </div>
        {{-- Services cont --}}
        <div class="services-tabs-cont d-flex wrap">
            <a href="http://">Book a Delivery</a>
            <a href="http://">Shop Specials</a>
            <a href="http://">Clothing</a>
            <a href="http://">Competitions</a>
            <a href="http://">Track my order</a>
            <a href="http://">PnP Mobile</a>
        </div>
        {{-- products-container --}}
        <div class="product-tabs w-100">
            <button class="prod-btn-left pos-abs">
                <p>
                    < </p>
            </button>
            <button class="prod-btn-right pos-abs">
                <p>></p>
            </button>
            <div class="product-tabs-header d-flex">
                <h4>Shop Our Top </h4>
                <p>Sellers</p>
            </div>
            <div class="products-carousel d-flex">
                <a class="flex-col j-sb">
                    <img src="/images/index/0.jpg" alt="" class="w-100">
                    <p class="w-100">This is the prodect name</p>
                    <p class="w-100 fw-bold">R 10 000</p>
                    <h4 class="fw-bold w-100">Smart Price: R 9002</h4>
                    <div class="prod-control w-100 d-flex">
                        <button>-</button>
                        <p class="fw-bold">1</p>
                        <button>+</button>
                    </div>
                    @if (Session::has('email'))
                        <button class="fw-bold">Add to trolley</button>
                    @else
                        <button onclick="document.querySelector('.login-reg-modal').style.display='flex'"
                            class="getLogin fw-bold">Add to
                            trolley</button>
                        <script></script>
                        {{-- <a href="/store/admin/login" class="m-auto">Log In</a> --}}
                    @endif

                    <div class="ratings">
                        <p hidden class="">2.5</p>
                    </div>

                </a>
            </div>
            <div class="shop-now-cont d-flex">
                <a href="/all/products">Shop Now ></a>
            </div>

        </div>
        {{-- end of main div --}}
    </div>

@stop
