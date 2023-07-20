<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    function addAdmin(Request $request){
        $validator = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required',
            'occupation'=>'required',
            // 'phone'=>'required',
         ]);

         $query = DB::table('admins')->insert([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'occupation'=>$request->input('occupation'),
            'phone'=>$request->input('phone'),
         ]);
         print_r($validator);
        $validator?true:
              redirect()->back()->withErrors($validator);
         return redirect('/store/admin/login')->with('success', 'Admin Registration Successful!');
        }

    function loginAdmin(Request $login_req){
      // get user email and pass from request
         $email = $login_req->input('email');
         $password = $login_req->input('password');
         // get users inventory
         $user = DB::table('admins')->whereEmail($email)->first();
         // if user exist run check
         if ($user) {
            // Get hashed pass
               $hashed = $user->password;
               // compare and set session if match
            if(Hash::check($password, $hashed)) {
                session(['name' => $user->name]);
                session(['email' => $email]);
                session(['password' => $password]);
                session(['occupation' => $user->occupation]);
                session(['phone' => $user->phone]);
                return redirect('/store/admin/dashboard')->with('login-success', 'Login Successful!');

               }
            else {
                return redirect()->back()->with('login-failure','Incorrect Email or Password');
            }
            # code...
         }else{
            return redirect()->back()->with('login-failure','Incorrect Email or Password');
         }
     }
        function  logoutAdmin(Request $request){
         $logout_request =  $request->session()->forget('name');
         $logout_request =  $request->session()->forget('email');
         $logout_request =  $request->session()->forget('password');
         $logout_request =  $request->session()->forget('occupation');
         $logout_request =  $request->session()->forget('phone');
        return redirect('/store/admin/login')->with('logout-success', 'Log Out Successful!');


     }

    //
     function adminUpdate(Request $request){
       $validator=$request->validate([
        'name'=>'required',
        'email'=>'required',
       ]);
       $update = DB::table('admins')
       ->where('email',$request->input('email'))
       ->update([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
         'occupation'=>$request->input('occupation'),
         'phone'=>$request->input('phone'),
       ]);
       $validator?redirect('/auth/login'):
              redirect()->back()->withErrors($validator);

        if ($update) {
            $logout_request =  $request->session()->forget('name');
            $logout_request =  $request->session()->forget('email');
            $logout_request =  $request->session()->forget('occupation');
            $logout_request =  $request->session()->forget('phone');
            session(['name' =>$request->input('name')]);
            session(['email' => $request->input('email')]);
            session(['occupation' => $request->input('occupation')]);
            session(['phone' => $request->input('phone')]);
            return redirect('/store/admin/dashboard/admins')->with('success', 'Admin details Updated Successfully');

        } else {
            return redirect()->back()->with('failure', 'Admin details Update Failure');

        }
     }

    function addProduct(Request $request){
        $uniqid = Str::random(9);
       $validator= $request->validate([
            'name'=>'required',
            'price'=>'required',
            'desc'=>'required',
            'discount'=>'required',
            'features'=>'required',
            'category'=>'required',
            'rating'=>'required',
            'stock'=>'required',
            'image'=>'required|image|mimes:jpeg,jpg,png,jpg,gif,svg|max:10048',
        ]);
        $input = $request->all();
        $input['image'] = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/products'), $input['image']);

        $query = DB::table('products')->insert([
            'barcode'=>$uniqid,
            'name'=>$input['name'],
            'desc'=>$input['desc'],
            'price'=>$input['price'],
            'discount'=>$input['discount'],
            'features'=>$input['features'],
            'category'=>$input['category'],
            'usage'=>$input['usage'],
            'warnings'=>$input['warnings'],
            'stock'=>$input['stock'],
            'rating'=>$input['rating'],
            'reviews'=>$input['reviews'],
            'image'=>$input['image'],
        ]);

        $validator?true:
              redirect()->back()->withErrors($validator);
         return redirect('/store/admin/login')->with('success', 'Product Added Successfully!');
    }

    function delProduct($barcode){
        $delete = DB::table('products')
        ->where('barcode',$barcode)
        ->delete();
        return redirect('/store/admin/dashboard/products')->with('success', 'Product Update Successfully!');


        }
    function deluser($email){
        $delete = DB::table('users')
        ->where('email',$email)
        ->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
        }

    function prodUpdate(Request $request){
        $validator=$request->validate([
            'name'=>'required',
            'price'=>'required',
            'desc'=>'required',
            'discount'=>'required',
            'features'=>'required',
            'category'=>'required',
            'rating'=>'required',
            'stock'=>'required',
        ]);
        $input = $request->all();
        $key = in_array('image', $input);
        if ($key) {
            $input['image'] = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/products'), $input['image']);
            $update = DB::table('products')
        ->where('id',$request->input('id'))
        ->update([
                'name'=>$input['name'],
                'desc'=>$input['desc'],
                'price'=>$input['price'],
                'discount'=>$input['discount'],
                'features'=>$input['features'],
                'category'=>$input['category'],
                'usage'=>$input['usage'],
                'warnings'=>$input['warnings'],
                'stock'=>$input['stock'],
                'rating'=>$input['rating'],
                'reviews'=>$input['reviews'],
                'image'=>$input['image'],

        ]);
        }else{
            $update = DB::table('products')
            ->where('id',$request->input('id'))
            ->update([
                'name'=>$input['name'],
                'desc'=>$input['desc'],
                'price'=>$input['price'],
                'discount'=>$input['discount'],
                'features'=>$input['features'],
                'category'=>$input['category'],
                'usage'=>$input['usage'],
                'warnings'=>$input['warnings'],
                'stock'=>$input['stock'],
                'rating'=>$input['rating'],
                'reviews'=>$input['reviews'],
            ]);
        }

        $validator?true:
              redirect()->back()->withErrors($validator);
         return redirect('/store/admin/dashboard/products')->with('success', 'Product Update Successfully!');
}}
