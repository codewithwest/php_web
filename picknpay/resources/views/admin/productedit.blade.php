@extends('auth')
@section('link_redirect')
    <a href="/store/admin/dashboard/users" class="m-auto">All Products</a>
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


@section('auth_content')
@foreach ($productByBarcode as $key => $data)

    <form action="/store/admin/products/update" enctype="multipart/form-data" class="sign-ind-form d-flex wrap j-sb m-auto"
        method="post">
        @csrf
        <h1>UPDATE PRODUCT</h1><br>
        <input hidden type="text" value="{{$data->id}}" name="id" value="{{ old('id') }}">

        <span class="m-auto-hor  d-flex w-100" style="height:250px; padding:10px;">
            <img src="/images/products/{{$data->image}}" class="h-100 m-auto-hor" style="width: 50%" alt="prod-image">
        </span>
        <br>
        <br>
        <div class="flex-col wrap">
            <label for="name">Product Name</label>
            <input type="text" value="{{$data->name}}" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex-col wrap">
            <label for="price">Price</label>
            <input type="number" value="{{$data->price}}" name="price" value="{{ old('price') }}">

        </div>
        <div class="flex-col wrap">
            <label for="discount">Discount</label>
            <input type="number" name="discount" value="{{$data->discount}}" value="{{ old('discount') }}">
        </div>
        <div class="flex-col wrap">
            <label for="features">Features</label>
            <input type="text" name="features" value="{{$data->features}}" value="{{ old('features') }}">
            @error('features')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <div class="flex-col wrap">
            <label for="desc">Description</label>
            <input type="text" name="desc" value="{{$data->desc}}" value="{{ old('desc') }}">
            @error('desc')
            <div class="error">{{ $message }}</div>
        @enderror
        </div>

        <div class="flex-col wrap">
            <label for="category">Category</label>
            <input type="text" name="category" value="{{$data->category}}" value="{{ old('category') }}">
            @error('category')
            <div class="error">{{ $message }}</div>
        @enderror

        </div>
        <div class="flex-col wrap">
            <label for="usage">Usage</label>
            <input type="text" name="usage" value="{{$data->usage}}" value="{{ old('usage') }}">

        </div>
        <div class="flex-col wrap">
            <label for="warnings">Warnings</label>
            <input type="text" name="warnings" value="{{$data->warnings}}" value="{{ old('warnings') }}">

        </div>
        <div class="flex-col wrap">
            <label for="stock">Stock</label>
            <input type="text" name="stock" value="{{$data->stock}}" value="{{ old('stock') }}">
        </div>
        <div class="flex-col wrap">
            <label for="rating">Rating</label>
            <input type="decimal" name="rating" value="{{$data->rating}}" value="{{ old('rating') }}">
        </div>
        <div class="flex-col wrap">
            <label for="reviews">Reviews</label>
            <input type="decimal" name="reviews" value="{{$data->reviews}}" value="{{ old('reviews') }}">
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
    @endforeach

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
