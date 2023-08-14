@extends('index')
@section('title')
    Join Us
@endsection

@section('main_content')
    <link rel="stylesheet" href="{{ asset('css/joinus.css') }}">
    <div class="join-us cont h-100 flex-col center-content">
        <p>Not a buddy yet?<a href="/signup">Join us</a></p>
        <form action="" class="flex-col m-auto-hor">

            <div class="d-flex wrap">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div class="d-flex wrap">
                <label for="new-password">Password</label>
                <input type="password" name="new-password">
            </div>


            <button class="m-auto-hor">Sign In</button>
        </form>
    </div>
@endsection
