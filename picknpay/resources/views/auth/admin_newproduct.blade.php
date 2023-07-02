@extends('auth')
@section('link_redirect')
    <div class="help d-flex center-content">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-circle"
            viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path
                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
        </svg>
        <p>Help</p>
    </div>
    @if (Session::has('email'))
        <a href="/store/admin/dashboard" class="m-auto">Dashboard</a>
    @else
        <a href="/store/admin/dashboard/products" class="m-auto">All Products</a>
    @endif
@endsection
@section('auth_content')
    <form action="/store/admin/dashboard/admins/addadmin/signup" class="sign-ind-form d-flex wrap j-sb m-auto"
        method="post">
        @csrf
        <h1>ADD NEW PRODUCT</h1><br>
        <div class="flex-col wrap">
            <label for="name">Product Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-col wrap">
            <label for="price">Price</label>
            <input type="number" name="price" value="{{ old('price') }}">

        </div>
        <div class="flex-col wrap">
            <label for="discount">Discount</label>
            <input type="number" name="discount" value="{{ old('discount') }}">
        </div>
        <div class="flex-col wrap">
            <label for="features">Features</label>
            <input type="text" name="features">
        </div>
        <div class="flex-col wrap">
            <label for="desc">Description</label>
            <input type="text" name="desc">
        </div>

        <div class="flex-col wrap">
            <label for="category">Category</label>
            <input type="text" name="category">

        </div>
        <div class="flex-col wrap">
            <label for="usage">Usage</label>
            <input type="text" name="usage">

        </div>
        <div class="flex-col wrap">
            <label for="warnings">Warnings</label>
            <input type="text" name="warnings">

        </div>
        <div class="flex-col wrap">
            <label for="stock">Stock</label>
            <input type="text" name="stock">
        </div>
        <div class="flex-col wrap">
            <label for="reviews">Reviews</label>
            <input type="decimal" name="reviews">
        </div>
        <div class="flex-col wrap">
            <label for="image">product Image</label>
            <input type="file" name="image">
        </div>
        <button class="sign-up-form-btn d-flex center-content ">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-lock"
                viewBox="0 0 16 16">
                <path
                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
            </svg>
            SIGN UP
        </button>
        <script>
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
@endsection