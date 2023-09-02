@extends('admin')
@section('link_redirect')
    <a href="/admin/dashboard/users" class="m-auto link">
        Users
    </a>
    <a href="/clear/session" class="link-tool link">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-door-open"
            viewBox="0 0 16 16">
            <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
            <path
                d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z" />
        </svg>
        <div class="popup">
            <div class="popuptext">
                Log Out
            </div>
        </div>
    </a>

@endsection

@section('admin_main_content')
<link rel="stylesheet" href="{{ asset('css/joinus.css') }}">
@if (Session::has('success'))
    <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-success m-auto fw-bold ">
            {{ Session::get('success') }}
        </div>
    </div>
    <script>
        setTimeout(() => document.querySelector('.alert-success-cont').style.display = "none", 3500)
    </script>
    @elseif (Session::has('failure'))
        <div class="alert-failure-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-failure m-auto fw-bold ">
            {{ Session::get('failure') }}
        </div>
    </div>
@endif
<div class="join-us cont h-100 flex-col center-content">

    <form action="/signup"  method="post" class="flex-col m-auto-hor">
        @csrf
        <div class="d-flex wrap">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname">
        </div>
        <div class="d-flex wrap">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname">
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

        <button class="m-auto-hor">Add User</button>
    </form>
</div>
@endsection
