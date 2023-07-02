@extends('admin')
@section('link_redirect')
    {{-- Don't have an account? --}}
    <a href="/store/admin/logout" class="link-tool">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-door-open"
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
    @if (Session::has('success'))
        <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
            <div class="alert-success m-auto fw-bold ">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="d-flex wrap">

        <button class="collapse-admin-nav">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="bi bi-list m-auto" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <nav class="admin-nav flex-col">
            <a class="links center-content d-flex" href="/store/admin/dashboard/admins">Admins</a>
            <a class="links center-content d-flex" href="/store/admin/dashboard/users">Users</a>
            <a class="links center-content d-flex" href="/store/admin/dashboard/products">Products</a>
            <a class="links center-content d-flex" href="/store/admin/dashboard/managers">Manager</a>
        </nav>

        <div class="admin-content">
            @yield('admin_content')
        </div>
    </div>
    <script>
        setTimeout(() => document.querySelectorAll('.alert-success-cont')
            .forEach(element => element.style.display = "none"), 3500)
        document.querySelector('.collapse-admin-nav').addEventListener('click', (e) => {
            e.preventDefault()
            el = document.querySelector('.admin-nav')
            el.style.display != "none" ?
                el.style.display = "none" :
                el.style.display = "flex"
        })
    </script>
@endsection
