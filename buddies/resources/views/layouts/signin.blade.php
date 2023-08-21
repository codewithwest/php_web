@extends('index')
@section('title')
    Join Us
@endsection

@section('main_content')
@if (Session::get('user.email'))
    @php
    str(Session::get('user.email'),'.admin')?
    header("Location: " . URL::to('/admin/dashboard'), true, 302):
    header("Location: " . URL::to('/'), true, 302);
    exit();
    @endphp
@else
 <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
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
    <link rel="stylesheet" href="{{ asset('css/joinus.css') }}">
    <div class="join-us cont h-100 flex-col center-content">
        <p>Not a buddy yet?<a href="/signup">Join us</a></p>
        <form action="" method="post" class="flex-col m-auto-hor">
            @csrf
            <div class="d-flex wrap">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div class="d-flex wrap">
                <label for="new-password">Password</label>
                <input type="password" name="password">
            </div>
            <br>
            <button class="m-auto-hor">Sign In</button>
        </form>
    </div>
    @endif
@endsection
