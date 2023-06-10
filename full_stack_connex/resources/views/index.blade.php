
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connex</title>
   <link rel="stylesheet" href="{{asset('css/style.css');}}">
   <link rel="stylesheet" href="{{asset('css/const.css');}}">
   <link rel="stylesheet" href="{{asset('css/forms.css');}}">
   <link rel="stylesheet" href="{{asset('css/cart.css');}}">
</head>
<body>
    <main class="main">
        <div class="admin-link">
            <a class="links" href="/admin">Manage Producs</a>
        </div>
          <!-- Cart manager cont -->
        <div class="cart-man-cont center-content">
            <div class="cart-man center-content">
                <button class="collapse-cart  b-none bg-none">X</button>
                 <div class="cart-header  center-content fw-bold fill">YOUR CART</div>
                 <div class="cart-items-cont center-content fill">
                 <div class="cart-items h-100 center-content ">
                        <div class="cart-items-inner center-content flex-col">
                            
                        </div> 
                    </div>
                    <div class="cart-items-tot center-content fw-bold">R0</div>
                    
                 </div>
                 <div class="checkout-form-cont fill center-content">
                    <form class="checkout-form flex-col j-sa" action="https://sandbox.payfast.co.za/eng/process" method="post" >
                        <input type="hidden" name="merchant_id" value="10029243">
                        <input type="hidden" name="merchant_key" value="aq8n8huwn8x20">
                        <input type="hidden" name="amount" class="embedded_total">
                        <input type="hidden" name="item_name" value="Dummy Items">
                        <h2>CHECKOUT DETAILS</h2>
                        <div  class="j-sa">
                            <label for="name_first">Name</label>
                        <input type="text" name="name_first" value="{{ request()->session()->get('name') }} "required>
                        </div>
                        <div class="j-sb">
                         <label for="email_address">Email</label>    
                        <input type="email" name="email_address" value="{{ request()->session()->get('email') }}" required></div>
                        <div  class="j-sa">
                         <label for="address">Address</label>    
                        <input type="text" name="address" value="{{ request()->session()->get('address') }}" required></div>
                         <div  class="j-sa">
                          <label for="cell_number">Phone</label>   
                         <input type="phone" name="cell_number" value="{{ request()->session()->get('phone') }}" required></div>
                         <button class="buy-items center-content bg-none b-none">BUY</button>
                    </form>
                 </div>
            </div>
           
        </div>
       
            <div class="cart-btn-cont center-content"> 
                <div class="cart-count center-content">0</div>
                <button class="cart-btn center-content">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icons" width="20" height="20" fill="red" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                </button>
            </div>
        <!-- Registration Form Cont -->
        <div class="reg-bg fill d-none center-content text-bg d-none">
                <form class="reg-form flex-col">
                @csrf   
                <h1 class="text-center">REGISTER</h1>
                    <input class="name m-auto center-content" minlength="3" type="text" name="name" placeholder="Name" required>
                    <input class="reg-email m-auto" type="email" name="email" placeholder="Email" required>
                    <input class="reg-addr m-auto" type="text" name="address" placeholder="Address" required>
                    <input class="reg-phone m-auto" type="phone" name="phone" placeholder="phone" required>
                    <input class="reg-password m-auto" type="password" minlength="6" name="password" placeholder="Password" required>
                    <input class="password-confirm m-auto" minlength="6" type="password" name="confirm" placeholder="Confirm Password" required>
                    <button class="register m-auto" type="submit">Register</button>
                    <p class="text-center">Have An Account? 
                        <a class="reg-login">Login</a>
                    </p>
                </form>
        </div>
        <!-- Login Form Cont -->
        <div  class="login-bg fill center-content text-bg">
                <form class="login-form flex-col">
                    <div class="exit-login center-content">X</div>
                    @csrf
                    <h1 class="text-center">Login</h1>
                    <input class="m-auto" type="email" name="email" placeholder="email" required>
                    <input class="login-password m-auto" type="password" name="password" placeholder="password" required>
                    <button class="login m-auto" type="submit" >Login</button>
                    <p>Don't have an Account? <a class="login-reg">Register</a></p>
                </form>
        </div>
        <!-- Profile Cont -->
        <div class="profile-cont center-content fill test-bg">
            <div class="reg-mes prof-upd-mes bg-success d-none">User Details Updated</div>
            <div class="profile">
                <button class="collapse-profile fw-bold bg-none b-none">X</button>
                <h2 class="m-auto-hor">USER PROFILE</h2>
                <form  class="update-det flex-col j-sb"> 
                @csrf 
                <input class="upd-name b-none" type="text" name="name" value="{{ request()->session()->get('name') }}">
                <input class="upd-email b-none" type="text" name="email" value="{{ request()->session()->get('email') }}">
                <input class="upd-pass b-none" type="text" name="password" disabled="password" placeholder="password" value="{{ request()->session()->get('password') }}">
                <input class="upd-address b-none" type="text" name="address"  placeholder="Address" value="{{ request()->session()->get('address') }}">
                <input class="upd-phone b-none" type="phone"  name="phone"  placeholder="Phone" value="{{ request()->session()->get('phone') }}">
                <button class="b-none bg-none" class="log-out-btn">Update Details</button>
                </form>
                <button class="log-out-btn b-none bg-none">log Out</button>
            </div>
            
        </div>
        <!-- Page Nav > 750px -->
        <nav class="nav">
            <div class="logo-cart">
                <div class="logo-cont center-content">
                    <img class="fill" src="{{asset('images/logo.jpg');}}" alt="" srcset="">
                </div>
                <div class="search-bar d-flex center-content">
                    <div class="in-search d-flex">
                        <input type="text" class="search d-flex">
                        <div class="search-icon d-flex center-content">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icons" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="email-init d-none"> {{ request()->session()->get('email') }}</p>
                <div class="cart-cont center-content">
                    <div class="cart d-flex border">
                        <div class="cart-icon center-content">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icons" width="20" height="20" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                        </div>
                       
                    <div class="cart-text center-content fill d-flex">
                        <!-- <p class="top-cart center-content"> -->
                            <p class="top-cart-count fill center-content"></p>
                            <p class="top-cart-cost fill center-content"></p>
                        <!-- </p> -->
                    </div>
                </div>
                </div>
            </div>
            <div class="main-nav"> 
            </div>
        </nav>
        <div class="min-nav">
            
            <div class="contact-no d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg> Phone: <a href="">010 009 5384</a>
            </div>
            <!-- Image Logo -->
            <div class="img-bg  ">
                <img class="fill" src="{{asset('images/logo.jpg');}}" alt="">
            </div>            
            <!-- Collapse nav -->
            <div class="nav-col">
                <div class="dd center-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <div class="dd-search center-content">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icons" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                </div>
                <div class="dd-prof center-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#fff" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                        <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                    </svg>
                </div>
                <!-- <div class="dd-cart"></div> -->
            </div>
            <div class="main-min-nav"></div>
        </div>
        <section class="body-cont">
            <div class="left-nav center">
                <div></div>
                <div class="left-nav-cont fill m-auto-hor flex-col">
                    
                   <div class="cat j-sb d-flex">
                    <p>Category</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                     height="16" id="cat-drop" fill="blue" class="dd-cat d-none bi bi-chevron-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                   </div>

                </div>
                <div class="advert d-flex fill"><img class="fill" src="/images/ads/ad0.png" alt=""></div>
                <div class="advert d-flex d-flex fill"><img class="fill" src="/images/ads/ad1.png" alt=""></div>
                <!-- <div class="advert fill"><img class="fill" src="/images/ads/ad2.png" alt=""></div> -->
            </div>
            <!-- Start Of right Cont -->
            <div class="right-cont"> 
                <!-- slide Cont -->
                <div class="slide-cont d-flex center-content">
                    <img src="/images/slide/slide0.jpg" class="fill">
                    <div class="slide-imgs">
                            <button class="left-right center-content"><</button>
                            <button class="left-right center-content">></button>
                    </div>
                </div>
              
                <!-- Start of first batch -->
                <div class="first-batch-cont center-content m-auto">
                <div class="first-batch d-flex">
                </div>
                </div>
                <!-- Main Products Start -->
            <div class="products-cont flex-col">
                <div class="feat-prod d-flex">
                    <p>FEATURED PRODUCTS</p>
                </div>
                <div class="first-batch-cont center-content m-auto">
                <div class="second-batch d-flex ">
                    <!-- Start of card -->
                    @foreach($products as $key => $data)
                        <div class="second-batch-card flex-col  text-center center-content">
                             <div class="cart-success-cont  fill bg-success center-content">
                                <div class="cart-success bs-success j-sa flex-col w-100">
                                <p class="text-center">Item Added to Cart</p> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="second-batch-main-card flex-col h-100">
                                    <div class="sec-batch-img d-flex">
                                        <img src="/images/featured/{{$data->image}}" class='fill'>
                                    </div>
                                    <div class="brand m-auto">Brand:{{$data->name}} </div>
                                    <div class="title center-content text-center">{{$data->desc}}</div>
                                    <div class="ratings j-sa" ><p class="d-none">{{$data->rating}}</p ></div>
                                    <div class="reviews text-center"></div>
                                    <div class="cost text-center">{{$data->price}}</div>
                                    <div class="add-cart center-content text-center">
                                        <button class="add-btn d-flex">
                                            <p class="d-none">{{$data->id}}</p>
                                            <div class="add-icon center-content h-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icons" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                                </svg>
                                            </div>
                                            <div class="add-text center-content h-100 fw-bold">
                                            Add To Cart</div>
                                        </button>
                                    </div>
                                    <div class="state text-center">{{$data->availability}}</div>
                            </div>
                            </div>
                    <!-- End of Card -->
                    @endforeach
                    
                </div>
                <!-- End of batch cont -->
                </div>
                <!-- End of Second Batch -->
                <!-- Bottom scroll -->
                <div class="opt-scroll">
                    <div class="right-left center-content">
                    <button class="fw-bold"><</button></div>
                    <div class="circles fill"></div>
                    <div class="right-left center-content">
                    <button class="fw-bold">></button></div>
                </div>
            </div>
        </div>
        </section>
        <!-- Start Of Footer -->
        <footer class="flex-col">
            <!-- Start of top footer -->
            <div class="top-footer d-flex text-center">
            </div>
            <!-- Start of the bottom footer -->
            <div class="bottom-footer">
                <div class="subscribe d-flex">
                    <h3>Sign Up To Connex News</h3>
                    <input type="text">
                    <button class="fw-bold news">SIGN UP</button>
                </div>
                <div class="main-foot-name d-flex">
                    <h2 class="m-auto-vert">CONNEX STORE</h2></div>
                <div class="main-foot">
                    <div class="main-inner-footer d-flex">
                        <div class="main-inner-div m-auto flex-col ">
                        </div>
                        <div class="main-inner-div m-auto flex-col ">

                        </div>
                        <div class="main-inner-div m-auto flex-col ">  
                        </div>
                    </div>
                    
                    <div class="follow">
                        <h4 class='center-content text-center'>Log In to your Account</h4>
                        <div class='social d-flex'>
                            <a class="m-auto center-content" href="https://www.facebook.com/profile.php?id=100079446613267">
                             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                class="bi bi-facebook disabled" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                            </a>
                            <a class="m-auto center-content">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                        </svg>
                            </a>
                            <a class="m-auto center-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                    class="bi bi-twitter disabled" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                            </a>
                            <a class="m-auto center-content">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            </a>
                </div>
                        <div class='d-flex'>
                                <div class="con m-auto d-flex">
                                    <div class="icon-con center-content ">
                                        <svg xmlns="http://www.w3.org/2000/svg"   fill="currentColor" class="bi bi-apple" viewBox="0 0 16 16">
                                            <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
                                            <path d="M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z"/>
                                        </svg>
                                    </div>
                                    <div class="text-con center-content flex-col ">
                                            <small class="m-auto">download on </small>
                                            <p class="m-auto">App Store</p>
                                    </div>
                                </div>
                                <div class="con m-auto d-flex">
                                    <div class="icon-con center-content">
                                        <svg xmlns="http://www.w3.org/2000/svg"  fill="#fff" class="bi bi-google-play" viewBox="0 0 16 16">
                                            <path d="M14.222 9.374c1.037-.61 1.037-2.137 0-2.748L11.528 5.04 8.32 8l3.207 2.96 2.694-1.586Zm-3.595 2.116L7.583 8.68 1.03 14.73c.201 1.029 1.36 1.61 2.303 1.055l7.294-4.295ZM1 13.396V2.603L6.846 8 1 13.396ZM1.03 1.27l6.553 6.05 3.044-2.81L3.333.215C2.39-.341 1.231.24 1.03 1.27Z"/>
                                        </svg>
                                    </div>
                                     <div class="text-con center-content flex-col ">
                                            <small class="m-auto">Download it  </small>
                                            <p class="m-auto">Play Store</p>
                                    </div>
                                </div>
                        </div>
                        <div class='d-flex'>
                    <div class="con con-2 m-auto d-flex">
                <div class="icon-con center-content ">
                                    <svg xmlns="http://www.w3.org/2000/svg"  fill="#fff" class="bi bi-google-play" viewBox="0 0 16 16">
                                        <path d="M14.222 9.374c1.037-.61 1.037-2.137 0-2.748L11.528 5.04 8.32 8l3.207 2.96 2.694-1.586Zm-3.595 2.116L7.583 8.68 1.03 14.73c.201 1.029 1.36 1.61 2.303 1.055l7.294-4.295ZM1 13.396V2.603L6.846 8 1 13.396ZM1.03 1.27l6.553 6.05 3.044-2.81L3.333.215C2.39-.341 1.231.24 1.03 1.27Z"/>
                                    </svg>
                </div>
                        <div class="text-con center-content flex-col">
                            <small class="m-auto">Explore it on the</small>
                            <p class="fw-bold m-auto">App Gallery</p>
                        </div>
                    </div>
                </div>
                        <div class='d-flex'>
                            <div class="con con-3 m-auto d-flex">
                                <div class="left-img-icon  h-100">
                                    <img class="fill" src="/images/featured/fp22.jpeg" alt=""></div>
                                <div class="right-con h-100">
                                    <div class="stars j-sb ">
                                            
                                    </div>
                                    <div class="rates center-content">
                                        4.59
                                    </div>
                                    <div class="view center-content  ">
                                        Excellent
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="comp-foot center-content ">
                    <small>Connex copyright @inc WestDynamics.Tech</small>
                </div>
            </div>
        </footer>
    </main>
    
</body>
<script src="{{asset('js/jquery-3.6.3.js')}}"></script>
<script src="{{asset('js/nav.js')}}" type="module"></script>
<script src="{{asset('js/firstBatch.js')}}" type="module"></script>
<script src="{{asset('js/footProd.js')}}" type="module"></script>
<script src="{{asset('js/auth-manager.js')}}" type="module"></script>
<script src="{{asset('js/cart-manager.js')}}" type="module"></script>
<script src="{{asset('js/login.js')}}" type="module"></script>
</html>
