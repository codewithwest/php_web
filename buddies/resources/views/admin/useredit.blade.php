@extends('admin.dashboard')
@section('link_redirect_by_section')
    <a href="/admin/dashboard/new/user" class="m-auto">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill"
            viewBox="0 0 16 16">
            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            <path fill-rule="evenodd"
                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
        </svg>
    </a>
@endsection
@section('link_redirect')
    <a href="/admin/dashboard/users" class="m-auto link fw-bold">All Users</a>
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
@section('admin_content')
    <style>
        .collapse-admin-nav {
            display: none
        }
        body,.admin-content {
            background: inherit
        }
    </style>

    @foreach ($userById as $key => $data)
    <div class="join-us cont h-100 flex-col center-content">
        <h2>Update User Profile</h2>
        <br>

        <form action="/admin/user/update"  method="post" class="flex-col m-auto-hor">
            @csrf
            <div class="d-flex wrap">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" value={{  $data->firstname  }}>
            @error('firstname')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div class="d-flex wrap">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" value={{  $data->lastname  }}>
                @error('lastname')
                <div class="error">{{ $message }}</div>
            @enderror
            </div>
            <div class="d-flex wrap">
                <label for="email">Email</label>
                <input type="email" name="email" value={{ $data->email }}>
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
    @endforeach
@endsection
