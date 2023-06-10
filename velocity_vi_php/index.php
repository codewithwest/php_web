<?php
    include('php/manager.php');
    $user = $_SESSION['email'] ?? false;
 
    if ($user) {
            $email = $_SESSION['email'];
            
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    
?>
    <div class="not_logged_in" style="display:none;">
    </div>
    <div class="logged_in" style="display:none;">
    </div>
    <?php
        if ($user) {
        ?>
    <p class="logged_email" style="display:none;">
        <?php echo htmlspecialchars($user); ?>
    </p>
    <?php 
        }
        ?>

    <!-- Nav BAr 1 -->

    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-bg-light" aria-label="Fifth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img src="./assets/logo.png" alt="" width="50" height="50">
            </a>
            <a class="navbar-brand fs-1 " href="#">Velocity VI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05"
                aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse py-3 mb-1" id="navbarsExample05">
                <div href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">

                </div>
                <ul class="nav  navbar-nav me-auto  justify-content-space-around font-size-sm me-auto ">

                    <!-- Nav list elements -->
                    <!-- <li class="nav-item fs-5">
                        <a href="#" class="nav-link active" aria-current="page">Home</a>
                    </li> -->
                    <li class="nav-item fs-5">
                        <?php
                        if($user){
                            // if ($cart[1] == 0 ){
                        ?>
                        <a href="views/cart.php" class="nav-link cart-link" aria-current="page" disabled>Cart</a>
                        <?php
                    // }else{                    
                    ?>
                        <?php
                        // }
                        }
                                ?>
                    </li>
                    <li class="nav-item fs-5">
                        <a href="views/blog.php" class="nav-link cart-link" aria-current="page">Blog</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a href="views/careers.php" class="nav-link cart-link" aria-current="page">
                            Careers
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- Search Bar -->
    <div class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Fifth navbar example">
        <div class="container d-flex flex-wrap justify-content-center ">
            <form class="col-10 col-lg-auto mb-2 mb-lg-0 me-lg-auto " role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
            <div class="text-end">
                <?php
                
        if ($user) {
            
            if($_SESSION['email'] ){
            ?>
                <!-- <button type="submit" class="btn btn-dark text-dark me-2 sign-out-btn gx-5">LogOut</button> -->
                <form action="php/manager.php" method="post">
                    <input type="text" style="display:none;" name="logout">
                    <button type="submit" class="btn btn-light text-dark me-2 sign-out-btn gx-5">LogOut</button>
                </form>



                <button type="button" class="btn btn-light text-dark me-2 sign-in-btn"
                    style="display:none;">Login</button>
                <button type="button" class="btn btn-primary sign-up-btn" style="display:none;">Sign-up</button>

                <?php
                }else {
                    ?>
                <button type="button" class="btn btn-light text-dark me-2 sign-out-btn gx-5"
                    style="display:none;">LogOut</button>
                <button type="button" class="btn btn-light text-dark me-2 sign-in-btn">Login</button>
                <button type="button" class="btn btn-primary sign-up-btn">Sign-up</button>
                <?php
            }}else{
?>
                <button type="button" class="btn btn-light text-dark me-2 sign-out-btn gx-5"
                    style="display:none;">LogOut</button>
                <button type="button" class="btn btn-light text-dark me-2 sign-in-btn">Login</button>
                <button type="button" class="btn btn-primary sign-up-btn">Sign-up</button>
                <?php    
        }
?>
            </div>
        </div>
    </div>


    <!-- Register Modal -->

    <!-- Start of container -->
    <div class="products-cont">
    </div>
    <!-- start of grid -->
    <div class="flex-cont">
        <!-- Start of columns -->
        <?php
        foreach ($productsList as $products) { 
        ?>

        <div class="card-group"> 
            <div class="card h-100 rounded-2 border-2 text-center shadow-sm cart-success opacity-50 position-relative  text-bg-success prod-card-succ">
                        <div class="container-fluid text-bg-success">
                        <p class="f-5">Item Added to Cart</p> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                class="bi bi-check-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                            </svg>
                        </div>
                    </div>
            <div class="card h-100 text-center shadow-sm prod-card">
                <div class="card-body">
                    <img src="./assets/home.png" width="500" height="200" class="card-img-top" alt="...">
                    <h5 class="card-title h-20"><?php echo htmlspecialchars($products[1]); ?></h5>
                    <p class="card-text h-auto card-text-sm "><?php echo htmlspecialchars($products[2]); ?></p>

                    <div class="card-footer h-100 panel-footer">R<?php echo htmlspecialchars($products[3]); ?></div>
                </div>
                <div class="card-footer panel-footer">
                    <div class="row footer-btns">
                        <div class="col" role="group" aria-label="Basic example">
                            <form class="add_to_cart_form" id="<?php echo htmlspecialchars($products[0]); ?>">
                                <button type="submit" class="btn btn-success d-flex justify-content-center add-to-cart">
                                    <input class="product_id" value="<?php echo htmlspecialchars($products[0]); ?>"
                                        style="display:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                        class="bi bi-cart-plus" viewBox="0 0 16 16">
                                        <path
                                            d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                        <path
                                            d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                    </svg>
                                    <p>Add to Cart</p>
                                </button>
                            </form>
                        </div>
                        <div class="col container" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-danger disabled add-to-fav">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class=""
                                    class="bi bi-suit-heart-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z" />
                                </svg>
                                <p>Favorites</p>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- End of Card -->
        <?php
        }
        ?>

        <!-- End of column -->
    </div>
    <!-- End of columns -->

    <!-- End of grid -->
    </div>
    <!-- <div class="products-cont"></div> -->
    <p></p>
    <!-- Second footer -->
    <footer class="bd-footer py-2 py-md-3 mt-5 bg-dark" style="z-index:500;">
        <div class="container py-2 py-md-3 px-4 px-md-3">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="/"
                        aria-label="Bootstrap">

                        <span class="fs-3 text-light">Velocity VI</span>
                    </a>
                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2">Bringing Bootstrap to light speed, by West-Tech of <a
                                href="https://codewithwest.github.io"> West Dynamics</a>.</li>
                        <li class="mb-2">

                        </li>
                        <li class="mb-2">VelocityVI © 2023 Company, Inc. All rights reserved.</li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1 mb-3">
                    <h5 class="text-light footer-links">Navigation</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="/">Home</a></li>
                        <li class="mb-2"><a href="views/careers.php">Careers</a></li>
                        <li class="mb-2"><a href="views/cart.php">Cart</a></li>
                        <li class="mb-2"><a href="views/blog.php">Blog</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="text-light footer-links">More</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2 " inactive><a class="disabled" >Getting started</a></li>
                        <li class="mb-2 disabled"><a  class="disabled">Starter template</a>
                        </li>
                        <li class="mb-2 disabled"><a  class="disabled">Webpack</a></li>
                        <li class="mb-2 disabled"><a  class="disabled">Parcel</a></li>

                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="text-light footer-links">Projects</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="http://full-stack-101.vercel.app/">VelocityI</a></li>
                        <li class="mb-2"><a href="https://connex-clone.vercel.app/">Connex clone</a></li>
                        <li class="mb-2"><a href="https://work-profile-e0686.web.app/">Work Profile</a></li>
                        <li class="mb-2"><a href="https://west-dynamics-fp9t.vercel.app/">React profile</a></li>
                        <li class="mb-2"><a href="https://codewithwest.github.io">West Dynamics</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-3">
                    <h5 class="text-light footer-links">Connect</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            <a href="https://wa.me/+27763999262"> WhatsApp
                            </a>
                        </li>
                        <li class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                class="bi bi-twitter disabled" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                            <a href="" disabled>Twitter</a>
                        </li>
                        <li class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg>
                            <a href="https://www.linkedin.com/in/jonas-lekgau-w1327/">LinkedIn</a>
                        </li>
                        <li class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                class="bi bi-facebook disabled" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                            <a href="https://www.facebook.com/profile.php?id=100079446613267">Facebook</a>
                        </li>
                        <li class="mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                class="bi bi-github" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                            </svg>
                            <a href="https://github.com/codewithwest?tab=repositories">GitHub
                                Overflow</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- Sign Up Form Start -->
    <div class="sign-in-container">

        <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog"
            id="modalSignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                        <h1 class="fw-bold mb-0 fs-2">Sign In</h1>
                        <button type="button" class="btn-close btn-sign-in-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form method="post" acton="php/manager.php" id="sign_in_form">
                            <div class="form-floating mb-3 sign_in_email_floating_email">
                                <input type="email" class="form-control rounded-3" id="sign_in_email"
                                    name="sign_in_email" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3 sign_in_pass_floating_pass">
                                <input type="password" class="form-control rounded-3" id="sign_in_pass"
                                    name="sign_in_pass" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary sign_in_btn" type="submit">Sign
                                in</button>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary sign_in_up_btn"
                                type="submit">Sign
                                up</button>
                            <!-- <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                            <hr class="my-4">
                            <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2> -->
                            <!-- <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000"
                                    class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                Sign up with Twitter
                            </button>
                            <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000"
                                    class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                                Sign up with Facebook
                            </button>
                            <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000"
                                    class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                Sign up with GitHub
                            </button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Form End -->
    <!-- Sign Up Form Start -->
    <div class="sign-up-container">
        <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog"
            id="modalSignin">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-4 shadow">
                    <div class="modal-header p-5 pb-4 border-bottom-0">
                        <!-- <h1 class="modal-title fs-5" >Modal title</h1> -->
                        <h1 class="fw-bold mb-0 fs-2">Sign up for free</h1>
                        <button type="button" class="btn-close btn-sign-up-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-5 pt-0">
                        <form method="post" id="sign_up_form">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control rounded-3" minlength="3"  id="sign_up_first_name"
                                    name="sign_up_first_name" minlength="4" placeholder="First Name" require>
                                <label for="floatingInput">First Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" minlength="3" class="form-control rounded-3" id="sign_up_last_name"
                                    name="sign_up_last_name" placeholder="Last Name">
                                <label for="floatingPassword" require>Last Name</label>
                            </div>
                            <div class="form-floating mb-3 sign_up_email_floating_email">
                                <input type="email" minlength="6" class="form-control rounded-3" id="sign_up_email"
                                    name="sign_up_email" placeholder="name@example.com" placeholder="Password">
                                <label for="floatingEmail">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" minlength="8" class="form-control rounded-3" id="sign_up_pass"
                                    name="sign_up_pass" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3 sign_up_pass_confirm_div">
                                <input type="password" minlength="8" class="form-control rounded-3"
                                    id="sign_up_pass_confirm" name="sign_up_pass_confirm"
                                    placeholder="Confirm Password">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary sign_out_btn" id="sign_up_btn" type="submit">
                                Sign up
                            </button>
                            <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
                            <!-- <hr class="my-4"> -->
                            <!-- <h2 class="fs-5 fw-bold mb-3">Or use a third-party</h2>
                            <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000"
                                    class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                Sign up with Twitter
                            </button>
                            <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000"
                                    class="bi bi-facebook" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                </svg>
                                Sign up with Facebook
                            </button>
                            <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000"
                                    class="bi bi-github" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                                </svg>
                                Sign up with GitHub
                            </button> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Form End -->

   <script type="module" src="./js/jquery-3.6.3.js"></script> 
    <script src="./js/manager.js" type="module"></script> 
    <!--<script src="./bootstrap/js/bootstrap.bundle.min.js"></script>--> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> <script src="./js/index.js">
        
    </script>

</body>

</html>