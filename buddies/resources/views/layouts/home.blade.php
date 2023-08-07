@extends('index')
@section('title')
    Home
@endsection

@section('main_content')
    <div class="home-cont">
        <div class="image-carousel d-flex m-auto-hor">
            <img src="{{ asset('images/home0.jpg') }}" class="img-slide fill" alt="">
            <div class="carousel-btns-cont   d-flex j-sb">
                <button class="carousel-btn b-none">
                    <</button>
                        <button class="carousel-btn b-none">></button>
            </div>
            <div class="pointer-divs d-flex center-content">
                <div class="pointers m-auto d-flex">
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>
                    <div class=""></div>

                </div>
            </div>
        </div>
        <div class="home-cont d-flex wrap">
                <div class="info-cards flex-col ">
                    <div class="card-wrapper d-flex m-auto  ">
                        <div class="card-img-cont flex-col">
                            <img src="{{ asset('images/home0.jpg') }}" alt="">
                            <p class="text-center">Founder: <br>
                                <span class="fw-bold">Tellow Baloys</span>
                            </p>
                        </div>

                        <div class="card-body flex-col">
                            <h1>This is the hedaer</h1>
                            <p>
                                @for ($v = 0; $v < 15; $v++)
                                    What is the use of all this shit
                                @endfor
                            </p>
                            <div class="card-footer d-flex center-content">
                                <p class="d-flex">Find Out More..</p>
                                <a class="card-explore d-flex" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-arrow-right-circle"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </div>

                </div>
        </div>
        <div class="cards-cont">
            @for ($k = 0; $k < 7; $k++)
                <div class="dis-cards flex-col">
                    <img src="/images/home1.jpg" alt="">
                    <h5>This cards</h5>
                    <p>This will be all that the card will say offf of it in the game.</p>
                    <button>Ten {{ $k }}</button>
                </div>
             @endfor
             <div class="push-over">

             </div>
        </div>
    </div>
@endsection

<script type="module" src="/js/home.js"></script>
