<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/const.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <title>
        @yield('title')
    </title>
</head>

<body>
    <header>
        @include('const._header')
    </header>
    <main>
        @yield('main_content')
    </main>
    <footer>
        @include('const._footer')
    </footer>
</body>
<script>
        setTimeout(() => document.querySelectorAll('.alert-success-cont')
            .forEach(element => element.style.display = "none"), 3500)
            setTimeout(() => document.querySelectorAll('.alert-failure-cont')
            .forEach(element => element.style.display = "none"), 3500)
    </script>
</html>
