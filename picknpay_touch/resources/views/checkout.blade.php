@if (Session::has('email'))
    @include('layouts.auth_header')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/const.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <h2 class="text-center">Your Cart</h2>
    <div class="main-cont d-flex wrap">
        <div class="checkout-cont  flex-col ">
            @foreach ($cart as $data)
                <div class="checkout-prod-cart d-flex">
                    <img src="/images/products/{{ substr(strval($data[0][4]), 0) }} " />
                    <p hidden>R {{ $data[0][3] }}</p>

                    <p>{{ substr(strval($data[0][1]), 0) }}</p>
                    <p>{{ substr(strval($data[0][2]), 0) }}</p>
                    <p class="fill d-flex center-content">R {{ (substr($data[0][3], 0) - 0.01) * $data[1] }}</p>
                    <div class="prod-cart-control d-grid">
                        <form class="inc-cart-form">
                            @csrf
                            <input hidden name="email" value="{{ request()->session()->get('email') }}" />
                            <input hidden name="barcode" value={{ $data[0][0] }} />
                            <button id={{ $data[0][0] }} class="b-none fw-bold">+</button>
                        </form>
                        <p class="fw-bold text-center fill">{{ $data[1] }}</p>
                        <form class="dec-cart-form m-auto">
                            @csrf
                            <input hidden name="email" value="{{ request()->session()->get('email') }}" />
                            <input hidden name="barcode" value={{ $data[0][0] }} />
                            <button id={{ $data[0][0] }} class="b-none fw-bold">-</button>
                        </form>
                    </div>

                </div>
            @endforeach
            <div class="counter-cont d-flex j-sb wrap">

                <div class="total-products fw-bold">

                </div>
                <div class="total-price fw-bold"></div>
            </div>
        </div>
        {{-- Check Out Form --}}

        <div class="checkout-form-cont  flex-col w-100 login-form-cont">
            <h1 class="text-center">Check Out Details</h1>

            <form action="https://sandbox.payfast.co.za/eng/process" class="sign-ind-form d-flex wrap j-sb m-auto"
                method="post">
                @csrf

                <div class="flex-col wrap">
                    <label for="email_address">Email address </label>
                    <input type="text" name="email_address" value="{{ request()->session()->get('email') }}">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <input type="hidden" name="merchant_id" value="10029243">
                <input type="hidden" name="merchant_key" value="aq8n8huwn8x20">
                <input type="hidden" class="checkout-price" name="amount" value="100.00">
                <input type="hidden" name="item_name" value="itdhnvbfugbvefsxsdwrtyuiokjnbcvnikrdfvcdfn">
                <div class="flex-col wrap">
                    <label for="name_first">Full Name </label>
                    <input type="text" name="name_first" value="{{ request()->session()->get('name') }}">

                </div>
                <div class="flex-col wrap">
                    <label for="address">Address </label>
                    <input type="text" name="address" value="{{ request()->session()->get('address') }}">
                </div>
                <div class="flex-col wrap">
                    <label for="phone">Phone</label>
                    <input type="phone" name="phone" value="{{ request()->session()->get('phone') }}">
                </div>

                <button class="sign-up-form-btn d-flex center-content ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                        class="bi bi-coin" viewBox="0 0 16 16">
                        <path
                            d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
                    </svg>
                    Proceed To Checkout
                </button>
                <script>
                    document.querySelector('.sign-up-form-btn').addEventListener('click', (e) => {
                        let pass = document.querySelectorAll('.sign-password')
                        if (pass[0].value !== pass[1].value || pass[0].value.length < 1 || pass[1].value.length < 1) {
                            e.preventDefault()
                            pass.forEach(element => {
                                element.style.border = "2px solid #faa"
                            });
                        }
                    })
                </script>
            </form>
        </div>
    </div>
    <script src="/js/cart-control.js"></script>
@else
    <?php
    
    header('Location:  /');
    
    exit();
    
    ?>
@endif

<br />
<br />
<br />
