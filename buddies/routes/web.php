<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizHandler;


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
    return view('layouts.home');
});
Route::get('/signup', function () {
    return view('layouts.joinus');
});
Route::get('/signin', function () {
    return view('layouts.signin');
});
Route::get('/quiz', function () {
    $option = DB::table('quizzes')->get();

    return view('layouts.quiz',['option' => $option]);
});
Route::get('/quiz/new', function () {
    $option = array(1,2,3);
    return view('layouts.newquiz',['option' => $option]);
});
Route::get('/quiz/type/{id}', function ($userId) {
    // ...

    // return view('admin.useredit',['option' => $option]);

});
Route::get('/about', function () {
    return view('layouts.about');
});


// Add Quiz
Route::post('/quiz/new', [QuizHandler::class, 'addQuiz']);
Route::post('/quiz', [QuizHandler::class, 'markQuiz']);
