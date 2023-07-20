@extends('main')
@section('content')
<link rel="stylesheet" href="{{ asset('css/product_view.css') }}">
    <div class="product-info d-flex wrap">
        @foreach ($prodByBarcode as $key => $data)

        <div class="prod-cont w-100 d-flex wrap">
            <div class="image-cont d-flex">
                <img src="/images/products/{{$data->image}}" alt="" class="w-100">
            </div>
            <div class="details-cont">
                <h2 class="w-100">{{$data->name}}</h2>

                @if ($data->discount>0)
                    <h4 class="fw-bold w-100">Smart Price: R {{$data->price*($data->discount/100)}}</h4>
                    @else
                    <h4 class="fw-bold w-100"></h4>
                    @endif
                <p class="w-100 fw-bold price">R  {{$data->price -0.01}}</p>

                <div class="prod-control w-100 d-flex">
                    <button>-</button>
                    <p class="fw-bold m-auto-vert">1</p>
                    <button>+</button>
                </div>
                @if (Session::has('email'))
                    <button id="{{$data->barcode}}" class="fw-bold">Add to trolley</button>
                @else
                    <button onclick="document.querySelector('.login-reg-modal').style.display='flex'"
                        class="getLogin fw-bold">Add to
                        trolley</button>
                    <script></script>
                    {{-- <a href="/store/admin/login" class="m-auto">Log In</a> --}}
                @endif

                <div class="ratings">

                    <p hidden class="">{{$data->rating}}</p>
                    <p>Ratings</p>
                </div>
            </div>
        </div>


   <div class="more-details flex-col w-100">
        @if ($data->desc)
        <details>
            <summary>Product Description</summary>
            <p>{{$data->desc}}</p>
        </details>
        @endif
        @if ($data->usage)
        <details>
            <summary>Product Usage</summary>
            <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
          </details>
        @endif
        @if ( $data->warnings)
        <details>
            <summary>>Product Warnings</summary>
            <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
          </details>
        @endif
        @if ($data->features)
        <details>
            <summary>Product Features</summary>
            @foreach (explode(":", $data->features) as $features)
            <ul>
                <li>{{$features}}</li>
            </ul>
            @endforeach
          </details>
        @endif
        @if ( $data->reviews)
        <details>
            <summary>Product Reviews</summary>
            <p>Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
          </details>
        @endif

   </div>
   @endforeach
    </div>
@endsection
