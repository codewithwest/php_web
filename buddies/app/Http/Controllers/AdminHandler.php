<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminHandler extends Controller
{
    function adminUserUpdate(Request $request){
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


        return redirect()->back()->with('success','Users Details Updated Succefully!');

    }
    function adminDelUser(Request $request){
        // return $request->email;
        $delete = DB::table('users')
        ->whereEmail($request->email)
        ->delete();
        return $delete?
         response()->json(['success'=>'Quiz deleted']):
          response()->json(['failure'=>'Failed to delete user'], 201,);;
    }

   //   Logout Auth

}
