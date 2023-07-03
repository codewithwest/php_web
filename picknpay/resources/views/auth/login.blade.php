@extends('auth')
@section('link_redirect')
    Don't have an account?
    <a href="/auth/signup">Sign up</a>
@endsection
@section('auth_content')
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

    <form action="/customer/signin/individual" class="login-form flex-col j-sa m-auto" method="post">
        <h3> LOG IN</h3>
        @csrf
        <p>
            Registered on our website or app?
            Use your same login details here.
        </p>
        <div class="flex-col wrap">
            <label for="username">Email address </label>
            <input type="email" name="email" required>
            <div class="error error-login">
                {{ Session::get('login-failure') }}
            </div>
        </div>
        <div class="flex-col wrap">
            <label for="password" class="d-flex j-sb">Password
                
                <button style="margin-right: 50px;" class="show-pass b-none bg-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#243567" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                  </svg></button></label>
            <input type="password" name="password" class="login-pass" required>
            <script>
                document.querySelector('.show-pass').addEventListener('click',(e)=>{
                    e.preventDefault()
                    let login_pass_input = document.querySelector('.login-pass')                    
                    if(login_pass_input.type=='password')
                    {login_pass_input.setAttribute('type', 'text')
                    document.querySelector('.show-pass').innerHTML = 
                    `<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#243567" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                  </svg>` }
                    else
                   { document.querySelector('.show-pass').innerHTML = 

                   ` <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#243567" class="bi bi-eye-slash" viewBox="0 0 16 16">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                        </svg>`
                    login_pass_input.setAttribute('type', 'password')}
                })
            </script>
            <div class="error error-login">
                {{ Session::get('login-failure') }}
            </div>
        </div>
        <a href="">Forgot password?</a>
        <button class="d-flex center-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-lock"
                viewBox="0 0 16 16">
                <path
                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
            </svg>
            LOG IN
        </button>
        <script>
            setTimeout(() =>
                document.querySelectorAll('.error-login').forEach(element =>
                    element.style.display = "none"
                ), 3500)
        </script>
    </form>
@endsection
