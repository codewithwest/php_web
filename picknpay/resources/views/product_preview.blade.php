@extends('main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/product_view.css') }}">
    <div class="product-info d-flex wrap">
        <div class="prod-cont w-100 d-flex wrap">
            <div class="image-cont d-flex">
                <img src="/images/index/0.jpg" alt="" class="w-100">
            </div>
            <div class="details-cont">
                <h2 class="w-100">This is the prodect name</h2>

                <h4 class="fw-bold w-100 reduced-price">Smart Price: R 9002</h4>
                <h4 class="fw-bold w-100 reduced-price">Smart Price: R 9002</h4>
                <p class="w-100 fw-bold price">R 10 000</p>

                <div class="prod-control w-100 d-flex">
                    <button>-</button>
                    <p class="fw-bold m-auto-vert">1</p>
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
                    <p>Ratings</p>
                </div>
            </div>
        </div>
    
      
   <div class="more-details flex-col w-100">
    <details>
        <summary>Product Information</summary>
        <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
      </details>
      <details>
        <summary>Nutritional Information</summary>
        <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
      </details>
      <details>
        <summary>Reviews</summary>
        <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
      </details>
   </div>
    </div>
@endsection