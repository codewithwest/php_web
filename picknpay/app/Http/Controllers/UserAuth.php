<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserAuth extends Controller
{
    //Add Into Database function
   function addCustomer(Request $request){
        $validator = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required',
            'address'=>'required',
            // 'phone'=>'required',
         ]);

         $query = DB::table('customers')->insert([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
         ]);
         print_r($validator);
        $validator?redirect('/auth/login'):
              redirect()->back()->withErrors($validator);
         return redirect('/auth/login')->with('success', ' Registration Successful!');
        }
   //   Update details
   function customerUpdate(Request $request){
       $validator=$request->validate([
        'name'=>'required',
        'email'=>'required',
       ]);
       $update = DB::table('customers')
       ->where('email',$request->input('email'))
       ->update([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
         'address'=>$request->input('address'),
         'phone'=>$request->input('phone'),
       ]);
       $validator?redirect('/auth/login'):
              redirect()->back()->withErrors($validator);

        if ($update) {
            $logout_request =  $request->session()->forget('name');
            $logout_request =  $request->session()->forget('email');
            $logout_request =  $request->session()->forget('address');
            $logout_request =  $request->session()->forget('phone');
            session(['name' =>$request->input('name')]);
            session(['email' => $request->input('email')]);
            session(['address' => $request->input('address')]);
            session(['phone' => $request->input('phone')]);
            return redirect()->back()->with('success', 'User details Updated Successfully');

        } else {
            return redirect()->back()->with('failure', 'User details Update Failure');

        }
     }
   // Login Authorization
   function loginCustomer(Request $login_req){
      // get user email and pass from request
         $email = $login_req->input('email');
         $password = $login_req->input('password');
         // get users inventory
         $user = DB::table('customers')->whereEmail($email)->first();
         // if user exist run check
         if ($user) {
            // Get hashed pass
               $hashed = $user->password;
               // compare and set session if match
            if(Hash::check($password, $hashed)) {
                session(['name' => $user->name]);
                session(['email' => $email]);
                session(['password' => $password]);
                session(['address' => $user->address]);
                session(['phone' => $user->phone]);
                return redirect('/')->with('login-success', 'Login Successful!');

               }
            else {
                return redirect()->back()->with('login-failure','Incorrect Email or Password');
            }
            # code...
         }else{
            return redirect()->back()->with('login-failure','Incorrect Email or Password');
         }
     }
   //   Logout Auth
   function  logoutCustomer(Request $request){
         $logout_request =  $request->session()->forget('name');
         $logout_request =  $request->session()->forget('email');
         $logout_request =  $request->session()->forget('password');
         $logout_request =  $request->session()->forget('address');
         $logout_request =  $request->session()->forget('phone');


                return redirect('/')->with('logout-success', 'Log Out Successful!');


     }

   function addtocart(Request $request){
         $request->validate([
               // 'name'=>'required',
               'email'=>'required',
               'product_ids'=>'required',
            ]);
            $email=$request->input('email');

            $user = DB::table('carts')->whereEmail($email)->first();
            if ($user) {
               $prod = $request->input('product_ids').','.$user->product_ids;
               $update = DB::table('carts')
                  ->where('email',$email)
                  ->update([
                  'product_ids'=>$prod,
                  ]);
            if($update) return response()->json(['success'=>'Laravel ajax example is being processed.']);
            else return response()->json(['fail'=>'Laravel ajax example is being processed.']);

            }
            else{
               $query = DB::table('carts')->insert([
               'email'=>$request->input('email'),
               'product_ids'=>$request->input('product_ids'),
            ]);
            if($query) return response()->json(['success'=>'Laravel ajax example is being processed.']);
         }
   }
   function getUserCart(Request $request) {
      $cart = DB::table('carts')->whereEmail($request->input('email'))->first();
       if ($cart) {
       $mainCart = explode(',',$cart->product_ids);
                     $myCart = array_count_values($mainCart);
                     $getProd = '';
                     foreach ($myCart as $key => $value) {
                        $getProd = $getProd . ',' . intval($key);
                     }
                     $getProd = ltrim( $getProd , ',' );
                     $prods = DB::table('products')->get();
                     $allUs = array();
                     // while ($row = mysqli_fetch_assoc($resA)) {
                     foreach ($prods as $key => $value) {
                        // if more tha one value in list
                        $allP = array($value->id,$value->name,$value->desc,$value->price);
                        array_push($allUs, $allP);
                      }
                     $cartValues = array();
                     foreach($allUs as $cartV){
                        if (in_array($cartV[0],$mainCart)) {
                        $allCP = array($cartV[0],$cartV[1],$cartV[2],$cartV[3]);
                        array_push($cartValues, array($allCP, $myCart[$cartV[0]]));
                     }
                     }
             return response()->json(['cart'=>$cartValues]);

                  }
            return response()->json(['success'=>'Laravel ajax example is being processed.']);


   }
// delelete single product entry from cart by id
   function deleteprod(Request $request){
         $email=$request->input('email');
         $user = DB::table('carts')->whereEmail($email)->first();
         if ($user) {
             $pid  = strval($user->product_ids);
             $splitPidStr = explode(',',$pid);
             if (($key = array_search($request->input('product_ids'), $splitPidStr)) !== false) {
                  array_splice($splitPidStr, $key, 1);
            }
            $wholeStr = implode(",",$splitPidStr);

            $update = DB::table('carts')
               ->where('email',$email)
               ->update([
               'product_ids'=>$wholeStr,
               ]);
         }

   }
   // Dellete All product with id entries
   function deleteallprod(Request $request){
         $email=$request->input('email');
         $user = DB::table('carts')->whereEmail($email)->first();
         if ($user) {
             $pid  = strval($user->product_ids);
             $splitPidStr = explode(',',$pid);
             for ($i=0; $i < count($splitPidStr); $i++) {
             if (($key = array_search($request->input('product_ids'), $splitPidStr)) !== false) {
                  array_splice($splitPidStr, $key, 1);
            }};
            $wholeStr = implode(",",$splitPidStr);

            $update = DB::table('carts')
               ->where('email',$email)
               ->update([
               'product_ids'=>$wholeStr,
               ]);
                if ($update) {
            return response()->json(['success'=>'Product Removed Sucessfully']);
         } else {
            return response()->json(['failure'=>'Product Removal Failure']);
         }
         } else {
            return response()->json(['failure'=>'Error Removing Product']);
         }

   }

}
