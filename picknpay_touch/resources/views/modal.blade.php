<div class="login-reg-modal pos-abs flex-col
  center-content top-0 bottom-0 left-0 right-0">
    <div class="modal-cont flex-col">
        <div class="collapse-log-reg-btn-cont d-flex">
            <button class="b-none collapse-log-reg-btn">X</button>
        </div>
        <h1>Login In or Sign Up to continue</h1>
        <div class="d-flex">
            <img src="{{ asset('images/smart-shopper.png') }}" width="150px" alt="">
            <p>Add your Smart Shopper card
                now so that you don't miss out on
                exclusive deals and SMART PRICES
            </p>
        </div>
        <div class="btns-cont">
            <a href="/auth/login" class="b-none modal-login-btn">LOG IN</a>
            <a href="/auth/signup" class="b-none modal-reg-btn">SIGN UP</a>
        </div>
    </div>
</div>

<script>
    document.querySelector('.collapse-log-reg-btn').addEventListener('click', () => {
        document.querySelector('.login-reg-modal').style.display = 'none'
    })
</script>
