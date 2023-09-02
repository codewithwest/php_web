<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserHandler extends Controller
{
    //Add Into Database function
   function userRegister(Request $request){
      // Validate the input
        $validator = $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
         ]);
         // Add the data to the database
         $query = DB::table('users')->insert([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
         ]);
         // Redirect acorsing to data
         if (str_contains($request->email, '.admin@buddies')) {
            # code...


        $validator?redirect('/signin'):
              redirect()->back()->withErrors($validator);
         return redirect('/signin')->with('success', ' Registration Successful!');
        } else {
        # code...$validator?redirect('/signin'):
              redirect()->back()->withErrors($validator);
         return redirect('/admin/signin')->with('success', 'Admin Registration Successful!');

        }
    }
    // Login Authorization
   function userLogin(Request $login_req){
        // get user email and pass from request
        $email = $login_req->email;
        $password = $login_req->password;
        // get users inventory
        $user = DB::table('users')->whereEmail($email)->first();
         // if user exist run check
        if ($user) {
            // Get hashed pass
               $hashed = $user->password;
               // compare and set session if match
            if(Hash::check($password, $hashed)) {
                $data = [
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'email' => $email,
                    'password' => $password,
                ];
                $login_req->session()->put('user',$data);
                // return print_r($login_req->session()->get('users'));
                // return session()->get('user.email');
                return str_contains(str(session()->get('user.email')), '.admin@buddies')? redirect('/admin/dashboard'):
                redirect('/')->with('success', 'Login Successful!');
               }
            else {
                // return Redirect::to(URL::previous());
                return redirect()->back()->with('failure','Incorrect Email or Password');
            }
            # code...
         }else{
            return redirect()->back()->with('failure','Incorrect Email or Password');
         }
    }
    //   Update details
   function userUpdate(Request $request){
       $validator = $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'password'=>'required',
         ]);
       $update = DB::table('users')
       ->where('email',$request->email)
       ->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $validator?true:
              redirect()->back()->withErrors($validator);
        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $request->session()->forget('user');
        session()->put('user',$data);

        return redirect()->back()->with('success','Users Details Updated Succefully!');

    }

    function userHistory(Request $request){
        $email = $request->session()->get('user.email');
        $history = DB::table('quizzes')
        ->whereEmail($email)->get();
        $quizzes = [];
        foreach ($history as $key => $data) {
            $stacker = [];
            $questions_list=explode(',', $data->questions);
            for ($i=0; $i < count($questions_list); $i++) {
                $question = DB::table('questions')
                    ->where('id',$questions_list[$i])->first();
                array_push($stacker, $question);
            }
            array_push($quizzes,[$stacker]);
            array_push($quizzes[$key], [
                'score'=>intval($data->score),
                'answers'=>explode(',',$data->answers),
                'quiz_id'=>$history[$key]->id
        ]);
        // return $questions_list;

        }
        // return $quizzes;

        return  view('layouts.history',['history'=>$quizzes]);
    }
    function delQuiz(Request $request){
        $delete = DB::table('quizzes')
        ->where('id',$request->quiz_id)
        ->delete();
        return response()->json(['success'=>'Quiz deleted']);
    }
}
