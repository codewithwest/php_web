@extends('index')
@section('title')
    Join Us
@endsection

@section('main_content')
    <link rel="stylesheet" href="{{ asset('css/joinus.css') }}">
    <div class="join-us cont h-100 flex-col center-content">
        <p>Already a buddy yet?<a href="/signin">Sign In</a></p>

        <form action="" class="flex-col m-auto-hor">
            <div class="d-flex wrap">
                <label for="fist-name">First Name</label>
                <input type="text" name="fist-name">
            </div>
            <div class="d-flex wrap">
                <label for="last-name">Last Name</label>
                <input type="text" name="last-name">
            </div>
            <div class="d-flex wrap">
                <label for="email">Email</label>
                <input type="email" name="email">
            </div>
            <div class="d-flex wrap">
                <label for="new-password">Password</label>
                <input type="password" name="new-password">
            </div>
            <div class="d-flex wrap">
                <label for="password">Re-type Password </label>
                <input type="password" name="password">
            </div>

            <button class="m-auto-hor">Sign Up</button>
        </form>
    </div>
@endsection
