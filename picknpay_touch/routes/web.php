<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\AdminAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Users Interface Interaction
Route::get('/', function () {
    $productsList = DB::table('products')->get();
    return view('index',['products' => $productsList ]);
});
Route::get('/{category}', function ($category) {
    $prod = DB::table('products')->where('category',$category)->get();
    return view('productsByCat',['products' => $prod]);
});

Route::get('/products/product/{barcode}', function ($barcode) {
    $prod = DB::table('products')->where('barcode',$barcode)->get();
    return view('product_preview',['prodByBarcode' => $prod]);
});


Route::get('/auth', function () {
    return redirect('auth/login');
});
Route::get('/auth/login', function () {

    return view('auth.login');
});

Route::get('/auth/signup', function () {
    return view('auth.signup');
});
Route::get('/auth/signup/individual', function () {
    return view('auth.ind_signup');
});

// Admin Interaction

// Admin Dash board
Route::get('/store/admin/dashboard', function () {
    return redirect('/store/admin/dashboard/admins');
});
// Admins dashboard tab
Route::get('/store/admin/dashboard/admins', function () {
     $adminslist = DB::table('admins')->get();
    return view('admin.admins',['admins' => $adminslist]);
});
// Users dashboard tab
Route::get('/store/admin/dashboard/users', function () {
     $adminslist = DB::table('customers')->get();
    return view('admin.users',['admins' => $adminslist]);
});
// Products dash board tab
Route::get('/store/admin/dashboard/products', function () {
     $productslist = DB::table('products')->get();
    return view('admin.products',['products' => $productslist]);
});

// Admin Auth
// Admin sign  up
Route::get('/store/admin/dashboard/new/admin', function () {
    return view('auth.admin_signup');
});
// Admin sign in
Route::get('/store/admin/login', function () {
    return view('auth.admin_signin');
});

Route::get('/store/admin/dashboard/new/product', function () {
    return view('auth.admin_newproduct');
});
Route::get('/store/admin/dashboard/new/user', function () {
    return view('auth.ind_signup');
});

// Get User to edit
Route::get('/store/admin/dashboard/users/{id}', function ($userId) {
    // ...
    $user = DB::table('customers')->where('id',$userId)->get();
    // echo $user;
    return view('admin.useredit',['userById' => $user]);

});
// Get Admin to edit
Route::get('/store/admin/dashboard/admins/{id}', function ($userId) {
    // ...
    $user = DB::table('admins')->where('id',$userId)->get();
    // echo $user;
    return view('admin.adminedit',['adminById' => $user]);

});

// Get Product to edit
Route::get('/store/admin/dashboard/products/{barcode}', function ($productBarcode) {
    // ...
    $product = DB::table('products')->where('barcode',$productBarcode)->get();
    // echo $user;
    return view('admin.productedit',['productByBarcode' => $product]);

});
// or
// Route::get('/users/{user}', 'UserController@show');
// UserController.php
// public function show(User $user)
// {
//     // ...
// }

// Add New User Route
Route::post('customer/signup/individual', [UserAuth::class, 'addCustomer']);
Route::post('customer/signin/individual', [UserAuth::class, 'loginCustomer']);
Route::get('customer/logout', [UserAuth::class, 'logoutCustomer']);
// Admin Auth
Route::post('/store/admin/dashboard/admins/add/new/admin', [AdminAuth::class, 'addAdmin']);
Route::post('/store/admin/dashboard/admins/admin/signin', [AdminAuth::class, 'loginAdmin']);
Route::get('store/admin/logout', [AdminAuth::class, 'logoutAdmin']);


// Customer Admin Update
Route::post('/store/admin/users/update', [UserAuth::class, 'customerUpdate']);
Route::post('/store/admin/admins/update', [AdminAuth::class, 'adminUpdate']);
Route::post('/store/admin/products/update', [AdminAuth::class, 'prodUpdate']);

// Customer Admin Delete
Route::get('/store/admin/products/delete/{barcode}', function ($ProdBarcode) {
    $delete = DB::table('products')
    ->where('barcode',$ProdBarcode)
    ->delete();
    return redirect('/store/admin/dashboard/products')->with('success', 'Product Deleted Successfully!');
});

Route::get('/store/admin/admins/delete/{id}', function ($id) {
    $delete = DB::table('admins')
    ->where('id',$id)
    ->delete();
    return redirect('/store/admin/dashboard/admins')->with('success', 'Admin Deleted Successfully!');
});

Route::get('/store/admin/products/user/{id}', function ($id) {
    $delete = DB::table('customers')
    ->where('id',$id)
    ->delete();
    return redirect('/store/admin/dashboard/users')->with('success', 'User Deleted Successfully!');
});


// Admin Products Add and Update
Route::post('/store/admin/dashboard/products/add/new/product', [AdminAuth::class, 'addProduct']);

// User Cart Work
Route::post('/products/user/new/cart', [UserAuth::class, 'addToCart']);
Route::post('/products/user/del/product/cart', [UserAuth::class, 'delProduct']);


// Get User Cart
Route::get('/products/user/checkout', [UserAuth::class, 'getUserCart']);
// Route::post('/auth/user/profile/', [UserAuth::class, 'customerUpdate']);

Route::get('/auth/user/profile/{id}', function ($userId) {
    // ...
    $user = DB::table('customers')->where('id',$userId)->get();
    return view('admin.profile',['userById' => $user]);

});
