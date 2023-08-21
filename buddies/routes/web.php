<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizHandler;
use App\Http\Controllers\UserHandler;
use App\Http\Controllers\AdminHandler;


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
Route::get('/quiz/attempt', function () {
    // Check if quiz is started and is logged in
    if (Session::has('questions') && Session::has('user.email')) {
        return view('layouts.quiz');
    } else {
        // else start a new quiz page
        return redirect('/quiz');
    }

});
Route::get('/quiz', function () {
    // Check if user is logged in else redirect to login
    if (Session::has('user.email')) {
        // If a quiz is started redirects to quiz number
        if (Session::has('questions')) {
                return redirect('/quiz/attempt');
            } else {
                // Else spin up a new quiz
                $options = DB::table('questions')->select('type','level')->distinct()->get();
                // return print_r($options);
                return view('layouts.get_quiz',['options' => $options]);
        }}else{
            return redirect('/signin');
        }
});
Route::get('/quiz/score', function () {
    // Check if
     if (Session::has('quiz_data.question_num')>3) {
        $questions = session()->get('questions');
        session()->forget('questions');
        return view('layouts.score',['questions' => $questions]);
     }else{
        return  redirect('/signin');
     }
});
// Route::get('/quizzes/history', function () {
//     return view('layouts.score',['questions' => $questions]);
// });


// Create New Question
Route::get('/admin/dashboard/questions/new', function () {
    $option = array(1,2,3);
    return view('admin.newquiz',['option' => $option]);
});
Route::get('/admin/dashboard/user/new', function () {
    return view('admin.new_user');

});
// Route::get('/quiz/type/{id}', function ($userId) {

//     // return view('admin.useredit',['option' => $option]);

// });
Route::get('/new/quiz/', function () {
    session()->forget('questions');
    session()->forget('quiz_data');
    return redirect('/quiz');

});
Route::get('/clear/session', function () {
    session()->flush();
    return redirect()->back()->with('success','Logout succesful, Do visit again!');

});
Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/session', function () {
    return session()->all();
});

// Get user profile
Route::get('/profile', function () {

    return view('layouts.profile');
});
// Add Quiz
Route::post('/quiz/new', [QuizHandler::class, 'addQuiz']);
Route::post('/quiz/attempt', [QuizHandler::class, 'markQuiz']);
Route::post('/quiz/create', [QuizHandler::class, 'createQuiz']);
Route::post('/quiz/grade', [QuizHandler::class, 'markQuiz']);
// User Auth
Route::post('/signup', [UserHandler::class, 'userRegister']);
Route::post('/signin', [UserHandler::class, 'userLogin']);
Route::post('/user/update', [UserHandler::class, 'userUpdate']);
// Get User History
Route::get('/quizzes/history', [UserHandler::class, 'userHistory']);

// Del quiz
Route::post('/quiz/del', [UserHandler::class, 'delQuiz']);
// Delete User
Route::post('/user/del', [AdminHandler::class, 'adminDelUser']);


// Admin Post Handlers
Route::post('/admin/user/update', [AdminHandler::class, 'adminUserUpdate']);


// Admin Dash board
Route::get('/admin/dashboard', function () {
    return redirect('/admin/dashboard/users');
});

// Admins dashboard tab
Route::get('/admin/dashboard/users', function () {
    if (Session::has('user') && str_contains(Session::get('user.email'), '.admin')) {
        $adminslist = DB::table('users')->get();
        return view('admin.users',['admins' => $adminslist]);
}
     return redirect('/admin/signin');
});
Route::get('/admin/dashboard/questions', function () {
    if (Session::has('user') && str_contains(Session::get('user.email'), '.admin')) {
        $questions = DB::table('questions')->get();
        return view('admin.questions',['questions' => $questions]);
    }
    return redirect('/admin/signin');
});
Route::get('/admin/dashboard/quizzes', function () {
    if (Session::has('user') && str_contains(Session::get('user.email'), '.admin')) {
        $quizzes = DB::table('quizzes')->get();
        return view('admin.quizzes',['quizzes' => $quizzes]);
    }
    return redirect('/admin/signin');
});

// Admin Auth
// Admin sign  up
Route::get('/admin/dashboard/new/admin', function () {
    return view('admin.login');
});
// Admin sign in
Route::get('/admin/signin', function () {
    return view('admin.login');
});

Route::get('/admin/dashboard/new/product', function () {
    return view('auth.admin_newproduct');
});
Route::get('/admin/dashboard/new/user', function () {
    return view('auth.ind_signup');
});

// Get User to edit
Route::get('/admin/dashboard/users/{id}', function ($userId) {
    // ...
    if (Session::has('user') && str_contains(Session::get('user.email'), '.admin')) {
    $user = DB::table('users')->where('id',$userId)->get();
    // echo $user;
    return view('admin.useredit',['userById' => $user]);
}
     return redirect('/admin/signin');
});
Route::get('/admin/dashboard/questions/{id}', function ($userId) {
    // ...
    if (Session::has('user') && str_contains(Session::get('user.email'), '.admin')) {
        $question = DB::table('questions')->where('id',$userId)->get();
        // echo $user;
        return view('admin.questionedit',['question' => $question]);
    }
     return redirect('/admin/signin');
});

// Get Product to edit
// Route::get('/admin/dashboard/users/{id}', function ($productBarcode) {
//     // ...
//     $product = DB::table('products')->where('barcode',$productBarcode)->get();
//     // echo $user;
//     return view('admin.productedit',['productByBarcode' => $product]);

// });

