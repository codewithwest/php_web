<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/const.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins.css') }}">
    <title>Login</title>
</head>

<body>
    @if (Session::has('login-success'))
        <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
            <div class="alert-success m-auto fw-bold ">
                {{ Session::get('login-success') }}
            </div>
        </div>
    @elseif (Session::has('logout-success'))
        <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
            <div class="alert-success m-auto fw-bold ">
                {{ Session::get('logout-success') }}
            </div>
        </div>
    @endif

    @include('layouts.auth_header')


    @yield('admin_main_content')

</body>
<script>
    setTimeout(() => document.querySelectorAll('.alert-success-cont')
        .forEach(element => element.style.display = "none"), 3500)
</script>

</html>
