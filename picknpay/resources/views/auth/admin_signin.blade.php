@extends('auth')
@section('link_redirect')
    {{-- Don't have an account?
    <a href="/auth/signup">Sign up</a> --}}
@endsection
@section('auth_content')
    @if (Session::has('success'))
        <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
            <div class="alert-success m-auto fw-bold ">
                {{ Session::get('success') }}
            </div>
        </div>
    @elseif (Session::has('logout-success'))
        <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
            <div class="alert-success m-auto fw-bold ">
                {{ Session::get('logout-success') }}
            </div>
        </div>
    @endif

    <form action="/store/admin/dashboard/admins/addadmin/signin" class="login-form flex-col j-sa m-auto" method="post">
        <h3> LOG IN</h3>
        @csrf
        <p style="color:red">
            For authorized personel only!
        </p>
        <div class="flex-col wrap">
            <label for="username">Email address </label>
            <input type="email" name="email" required>
            <div class="error error-login">
                {{ Session::get('login-failure') }}
            </div>
        </div>
        <div class="flex-col wrap">
            <label for="password">Password</label>
            <input type="password" name="password" required>
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
            setTimeout(() => document.querySelectorAll('.alert-success-cont')
                .forEach(element => element.style.display = "none"), 3500)
            setTimeout(() =>
                document.querySelectorAll('.error-login').forEach(element =>
                    element.style.display = "none"
                ), 3500)
        </script>
    </form>
@endsection
