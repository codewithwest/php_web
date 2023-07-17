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
    @endsection
        @if (Session::has('success'))
            <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
                <div class="alert-success m-auto fw-bold ">
                    {{ Session::get('success') }}
                </div>
            </div>
        @elseif (Session::has('failure'))
            <div class="alert-success-cont top-0 pos-abs d-flex center-content w-100">
                <div class="alert-success bg-fail m-auto fw-bold ">
                    {{ Session::get('failure') }}
                </div>
            </div>
    @endif
    @if (Session::has('email'))
        <a href="/store/admin/dashboard" class="m-auto">Dashboard</a>
    @else
        <a href="/store/admin/dashboard/products" class="m-auto">All Products</a>
    @endif
@endsection
@section('auth_content')
    <form action="/store/admin/dashboard/products/add/new/product" enctype="multipart/form-data" class="sign-ind-form d-flex wrap j-sb m-auto"
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
            <input type="text" name="features" value="{{ old('features') }}">
            @error('features')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <div class="flex-col wrap">
            <label for="desc">Description</label>
            <input type="text" name="desc" value="{{ old('desc') }}">
            @error('desc')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>

        <div class="flex-col wrap">
            <label for="category">Category</label>
            <input type="text" name="category" value="{{ old('category') }}">
            @error('category')
            <div class="error">{{ $message }}</div>
        @enderror

        </div>
        <div class="flex-col wrap">
            <label for="usage">Usage</label>
            <input type="text" name="usage" value="{{ old('usage') }}">

        </div>
        <div class="flex-col wrap">
            <label for="warnings">Warnings</label>
            <input type="text" name="warnings" value="{{ old('warnings') }}">
 
        </div>
        <div class="flex-col wrap">
            <label for="stock">Stock</label>
            <input type="text" name="stock" value="{{ old('stock') }}">
        </div>
        <div class="flex-col wrap">
            <label for="rating">Rating</label>
            <input type="decimal" name="rating" value="{{ old('rating') }}">
        </div>
        <div class="flex-col wrap">
            <label for="reviews">Reviews</label>
            <input type="decimal" name="reviews" value="{{ old('reviews') }}">
        </div>
        <div class="flex-col wrap">
            <label for="image">Product Image</label>
            <input type="file" class="custom-file-input" name="image" value="{{ old('image') }}">
            @error('image')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <button class="sign-up-form-btn d-flex center-content ">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg>
            New Product
        </button>
        
    </form>

    <style>
        .login-form-cont {
     padding: 20px;
    height:min-content;
}
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Choose Image';
  font-weight: 800;
  margin: 0;
  /* display: inline-block; */
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  padding: 14px 7px;
  outline: none;
  transition: all .5s;

   
   
}
.custom-file-input:hover::before {
    transition: all .8s;
  border-color: black;
  border: 1.5px solid #999;

  border-radius: 5px;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
    </style>
@endsection
