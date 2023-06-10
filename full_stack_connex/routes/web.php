<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCrud;
use App\Http\Controllers\AdminCrud;

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

Route::get('/', function () {
    $products = DB::table('products')->get();
    return view('index',['products' => $products]);
});
Route::get('/admin', function () {
    $productslist = DB::table('products')->get();
    $userslist = DB::table('users')->get();
    return view('admin',['products' => $productslist,'users' => $userslist,]);
});
// Route::get('view-records','StudViewController@index');
// Route::resource('users', UserController::class);
Route::post('add', [UserCrud::class, 'add']);
Route::post('userupdate', [UserCrud::class, 'userupdate']);
// Route::post('addproduct', [AdminCrud::class, 'addproduct']);
Route::get('addproduct', [AdminCrud::class, 'addproduct']);
Route::post('addproduct', [AdminCrud::class, 'addproduct']);
Route::post('produpdate', [AdminCrud::class, 'produpdate']);
Route::get('delproduct/{id}', [AdminCrud::class, 'delproduct']);
Route::get('deluser/{email}', [AdminCrud::class, 'deluser']);
Route::post('loginauth', [UserCrud::class, 'loginauth']);
Route::get('logout', [UserCrud::class, 'logout']);

Route::get('addtocart', [UserCrud::class, 'addtocart']);
Route::get('getusercart', [UserCrud::class, 'getusercart']);
Route::get('deleteprod', [UserCrud::class, 'deleteprod']);
Route::get('deleteallprod', [UserCrud::class, 'deleteallprod']);
