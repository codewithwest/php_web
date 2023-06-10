<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserCrud extends Controller
{
    //Add Into Database function
   function add(Request $request){
         $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'address'=>'required',
            'phone'=>'required',
         ]);
        
         $query = DB::table('users')->insert([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
         ]);


         if ($query) {
            return response()->json(['success'=>'Laravel ajax example is being processed.']);
         } else {
            return response()->json(['failure'=>'User Already Exists Sign In Instead.']);
         }
     }
   //   Update details
   function userupdate(Request $request){
      //  $request->validate([
      //   'name'=>'required',
      //   'email'=>'required',
      //   'password'=>'required',
      //    'address'=>'required',
      //    'phone'=>'required',
      //  ]);
       $update = DB::table('users')
       ->where('email',$request->input('email'))
       ->update([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
      //   'password'=>$request->input('password'),
         'address'=>$request->input('address'),
         'phone'=>$request->input('phone'),
       ]);

        if ($update) {
            $logout_request =  $request->session()->forget('name');
            $logout_request =  $request->session()->forget('email');
            $logout_request =  $request->session()->forget('address');
            $logout_request =  $request->session()->forget('phone');
            session(['name' =>$request->input('name')]);
            session(['email' => $request->input('email')]);
            session(['address' => $request->input('address')]);
            session(['phone' => $request->input('phone')]);
            return response()->json(['success'=>'Product Updated Successfully.']);
        } else {
            return response()->json(['failure'=>'Product Update Failed.']);
        }
     }
   // Login Authorization
   function loginauth(Request $login_req){
      // get user email and pass from request
         $email = $login_req->input('email');
         $password = $login_req->input('password');
         // get users inventory
         $user = DB::table('users')->whereEmail($email)->first();
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
                  return response()->json(['status'=>'true', 'message'=>'You Have Successfully Logged in']);
               } 
            else {
               return response()->json(['status'=>'false', 'message'=>'Incorrect Password or Email']);
            }
            # code...
         }else{
            // return "Email Does Not Exist, Register Instead!";
            return response()->json(['status'=>'false', 'message'=>'Incorrect Password or Email']);
         }
     }
   //   Logout Auth
   function  logout(Request $request){
         $logout_request =  $request->session()->forget('name');
         $logout_request =  $request->session()->forget('email');
         $logout_request =  $request->session()->forget('password');
         $logout_request =  $request->session()->forget('address');
         $logout_request =  $request->session()->forget('phone');
          
         return response()->json(['status'=>'true', 'message'=>'Successfully Logged Out']);
          
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
   function getusercart(Request $request) {
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
