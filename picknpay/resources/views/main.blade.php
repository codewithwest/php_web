<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/const.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">

</head>

<body class="">
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
    @include('modal')
    <header class="header-cont">
        @include('layouts.header')
    </header>
    <main class="">
        @yield('content')
    </main>

    <footer>
        @include('layouts.footer')
    </footer>
</body>
<script>
    setTimeout(() => document.querySelectorAll('.alert-success-cont')
        .forEach(element => element.style.display = "none"), 3500)
</script>
<script src="{{ asset('js/index.js') }}" type="module"></script>
<script src="{{ asset('js/ratings.js') }}" type="module"></script>

</html>
