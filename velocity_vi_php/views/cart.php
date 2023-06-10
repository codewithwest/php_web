<?php
    include('../php/manager.php');
    $user = $_SESSION['email'] ?? false;
    // echo print_r($cart);
    if (!$user) {
        header('Location: /');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fifth navbar example">
        <div class="container-fluid ">

            <a class="navbar-brand fs-1" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-box-arrow-left" viewBox="0 0 16 16" fill="#fff">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                    <path fill-rule="evenodd"
                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                </svg>
            </a>
            <p class="navbar-brand fs-1" href="#" style="margin:0;">CART</p>
        </div>

    </nav>

    <p class="logged-email" style="display:none;"><?php 
        echo htmlspecialchars($user); ?></p>
    <div class="checkout-container" id="checkout-container">
        <div class="container-fluid">

            <div class="container bg-light">
                <main>
                    <div class="py-5 text-center">
                        <img class="d-block mx-auto mb-4" src="../assets/home.png" alt="" width="72" height="57">
                        <h2>Checkout form</h2>

                    </div>

                    <div class="row g-5">
                        <div class="col-md-5 col-lg-4 order-md-last">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-primary">Your Cart</span>
                                <span class="badge bg-primary rounded-pill no-of-items">3</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <?php
                    if ($user) {
                    if (is_array($cart)) {
                    foreach($cart as $cartValue){
                        ?>
                                <!-- flex-prod-cont -->
                                <li class="list-group-item lh-sm flex-prod-cont">
                                    <form action="https://sandbox.payfast.co.za/eng/process" method="post"  class="position-absolute  mb-1 top-0 end-0 rmv-itm-cart">
                                        <button class=" position-relative mb-2 me-1 fw-bold border-0 text-bg-light bg-transparent">
                                            x
                                        </button>
                                    
                                    </form>
                                    <div >
                                        <h6 class="my-0">
                                            <?php 
                                            echo htmlspecialchars($cartValue[0][1]); ?>
                                        </h6>
                                    
                                        <small class="text-muted">
                                            <?php echo htmlspecialchars($cartValue[0][2]); ?></small>
                                    </div>
                                    <div class="text-muted center-price ">
                                        <p id="<?php echo htmlspecialchars($cartValue[0][3]); ?>">
                                            </p>
                                    </div>
                                    <div class="text-muted inc-dec-btn">
                                        <form class="inc-product">
                                            <input value="<?php echo htmlspecialchars($cartValue[0][0]); ?>"
                                                style="display:none;" disabled>
                                            <button>+</button>
                                        </form>
                                        <p class="price-quantity"><?php echo htmlspecialchars($cartValue[1]); ?></p>
                                        <form class="dec-product">
                                            <input type="text" name=""
                                                value="<?php echo htmlspecialchars($cartValue[0][0]); ?>"
                                                style="display:none;" disabled>
                                            <button>-</button>
                                        </form>

                                    </div>
                                    <p class=" m-0 text-end fw-bold">R<?php echo htmlspecialchars($cartValue[0][3] * $cartValue[1]); ?></p>
                                    <?php
                                        }}
                                ?>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (RND)</span>
                                    <strong class="cart-tot-val">
                                        <?php
                                        $tot=0;
                                        if (is_array($cart)) {
                                        foreach ($cart as $value) {
                                            $tot = $tot + ($value[0][3] * $value[1]);
                                        }}
                                        ?>
                                        R<?php echo htmlspecialchars($tot); ?>
                                    </strong>
                                </li>
                            </ul>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-7 col-lg-8">
                            <h4 class="mb-3">Billing address</h4>
                            <form action="https://sandbox.payfast.co.za/eng/process" method="post" class="needs-validation" >
                                <input type="hidden" name="merchant_id" value="10029243">
                                <input type="hidden" name="merchant_key" value="aq8n8huwn8x20">
                                <input type="hidden" name="amount" class="embedded_total">
                                
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" name="name_first" id="firstName" placeholder="" value=""
                                            required >
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="lastName" name="name_last" placeholder="" value=""
                                            required >
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>
                                    <!-- <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" id="username" placeholder="Username"
                                                required="">
                                            <div class="invalid-feedback">
                                                Your username is required.
                                            </div>
                                        </div>
                                    </div> -->
                                    <input type="hidden" name="confirmation_address" class="confirmation_email_address">
                                    
                                    <!-- <div class="col-12">
                                        <label for="email" class="form-label">Email <span
                                                class="text-muted">(Optional)</span></label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="you@example.com">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address.
                                        </div>
                                    </div> -->
                                <!-- <hr class="my-4">
                                <h4 class="mb-3">Payment</h4>
                                <div class="my-3">
                                    <div class="form-check">
                                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                            checked="" required="">
                                        <label class="form-check-label" for="credit">Credit card</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                            required="">
                                        <label class="form-check-label" for="debit">Debit card</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                            required="">
                                        <label class="form-check-label" for="paypal">PayPal</label>
                                    </div>
                                </div> -->

                                <!-- <div class="row gy-3">
                                    <div class="col-md-6">
                                        <label for="cc-name" class="form-label">Name on card</label>
                                        <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                        <small class="text-muted">Full name as displayed on card</small>
                                        <div class="invalid-feedback">
                                            Name on card is required
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="cc-number" class="form-label">Credit card number</label>
                                        <input type="text" class="form-control" id="cc-number" placeholder=""
                                            required="">
                                        <div class="invalid-feedback">
                                            Credit card number is required
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="cc-expiration" class="form-label">Expiration</label>
                                        <input type="text" class="form-control" id="cc-expiration" placeholder=""
                                            required="">
                                        <div class="invalid-feedback">
                                            Expiration date required
                                        </div>
                                    </div> -->

                                    <!-- <div class="col-md-3">
                                        <label for="cc-cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                        <div class="invalid-feedback">
                                            Security code required
                                        </div>
                                    </div>
                                </div> -->

                                <hr class="my-4">
                                

                                <input type="hidden" name="item_name" value="Test Product">
                                <button class="w-100 btn btn-primary btn-lg pay_up" type="submit">
                                    Continue to
                                    checkout</button>
                            </form>
                        </div>
                    </div>
                </main>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">VelocityXI © 2023 Company, Inc. All rights reserved.</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                </footer>
            </div>
        </div>
        <!-- Enf of Checkout -->
    </div>


    <script type="module" src="../js/jquery-3.6.3.js"></script>
    <script src="../js/cart-manager.js" type="module"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../js/index.js"></script> -->
</body>

</html>