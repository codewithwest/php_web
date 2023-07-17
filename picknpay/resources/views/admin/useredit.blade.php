@extends('auth')
@section('link_redirect')
    <a href="/store/admin/dashboard/users" class="m-auto">All Users</a>
@endsection
@if (Session::has('success'))
    <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-success m-auto fw-bold ">
            {{ Session::get('success') }}
        </div>
    </div>
    <script>
    </script>
@elseif (Session::has('failure'))
    <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
        <div class="alert-success bg-fail m-auto fw-bold ">
            {{ Session::get('failure') }}
        </div>
    </div>
@endif
@section('auth_content')
    <style>
        .sign-ind-form>div>input {
            outline: none;
            border: none;
            background: none;
            border-bottom: 1px solid red;
        }
    </style>

    @foreach ($userById as $key => $data)
        <form action="/store/admin/users/update" class="sign-ind-form d-flex wrap j-sb m-auto" method="post">
            @csrf
            <h1> USER DETAILS UPDATE</h1><br>
            <div class="flex-col wrap">
                <label for="email">Email address </label>
                <input type="text" name="email" value="{{ $data->email }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex-col wrap">
                <label for="name">Full Name </label>
                <input type="text" name="name" value="{{ $data->name }}">

            </div>
            <div class="flex-col wrap">
                <label for="address">Address </label>
                <input type="text" name="address" value="{{ $data->address }}">
            </div>
            <div class="flex-col wrap">
                <label for="phone">Phone</label>
                <input type="phone" name="phone" value="{{ $data->phone }}">
            </div>
            <button class="sign-up-form-btn d-flex center-content ">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-lock"
                    viewBox="0 0 16 16">
                    <path
                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
                </svg>
                Update Details
            </button>
            <script>
                setTimeout(() => document.querySelectorAll('.alert-success-cont')
                    .forEach(element => element.style.display = "none"), 3500)
                document.querySelector('.sign-up-form-btn').addEventListener('click', (e) => {
                    let pass = document.querySelectorAll('.sign-password')
                    if (pass[0].value !== pass[1].value || pass[0].value.length < 1 || pass[1].value.length < 1) {
                        e.preventDefault()
                        pass.forEach(element => {
                            element.style.border = "2px solid #faa"
                        });
                    }
                })
            </script>
        </form>
    @endforeach
@endsection
