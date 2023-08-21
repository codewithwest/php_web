@extends('index')
@section('title')
    Join Us
@endsection

@section('main_content')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    @if (Session::has('success'))
        <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
            <div class="alert-success m-auto fw-bold ">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="join-us cont h-100 flex-col center-content">
        <h2>User Profile</h2>

        <form action="/user/update"  method="post" class="flex-col m-auto-hor">
            @csrf
            <div class="d-flex wrap">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" value={{  Session::get('user.firstname') }}>
            @error('firstname')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div class="d-flex wrap">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" value={{  Session::get('user.lastname') }}>
                @error('lastname')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div class="d-flex wrap">
                <label for="email">Email</label>
                <input type="email" name="email" value={{ Session::get('user.email') }}>
                @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div class="d-flex wrap">
                <label for="new-password">Password</label>
                <input type="password" name="password" value={{ Session::get('user.password') }}>
                @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <button class="m-auto-hor">Update Profile</button>
        </form>
    </div>
@endsection
