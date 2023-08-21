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
        $validator?redirect('/signin'):
              redirect()->back()->withErrors($validator);
         return redirect('/signin')->with('success', ' Registration Successful!');
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
                redirect()->back()->with('login-success', 'Login Successful!');
               }
            else {
                // return Redirect::to(URL::previous());
                return redirect()->back()->with('login-failure','Incorrect Email or Password');
            }
            # code...
         }else{
            return redirect()->back()->with('login-failure','Incorrect Email or Password');
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

   //   Logout Auth
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
        // return $request->quiz_id;
        $delete = DB::table('quizzes')
        ->where('id',$request->quiz_id)
        ->delete();
        return response()->json(['success'=>'Quiz deleted']);
    }
   function addToCart(Request $request){
         $validator=$request->validate([
               'email'=>'required',
               'barcode'=>'required',
            ]);
            $email=$request->input('email');
            $user = DB::table('carts')->whereEmail($email)->first();
            if ($user) {
               $prod = $request->input('barcode').','.$user->product_barcodes;
               $update = DB::table('carts')
                  ->where('email',$email)
                  ->update([
                  'product_barcodes'=>$prod,
                  ]);
               return $update?response()->json(['success'=>'Item added to cart.'])
                : response()->json(['fail'=>'Process failed.']);
            }
            else{
               $query = DB::table('carts')->insert([
               'email'=>$request->input('email'),
               'product_barcodes'=>$request->input('barcode'),
            ]);
            if($query) return response()->json(['success'=>'Item added to cart.']);
         }
   }

   function getUserCart(Request $request) {
    $requestEmail = $request->session()->get('email');
      $cart = DB::table('carts')->whereEmail($requestEmail)->first();
       if ($cart) {
       $mainCart = explode(',',$cart->product_barcodes);

            $myCart = array_count_values($mainCart);
            $getProd = '';
            foreach ($myCart as $key => $value) {
            $getProd = $getProd . ',' . intval($key);
            }
            $getProd = ltrim( $getProd , ',' );
            $prods = DB::table('products')->get();
            $allUs = array();

            foreach ($prods as $key => $value) {
            // if more tha one value in list
                $allP = array($value->barcode,$value->name,$value->desc,$value->price,$value->image);
                array_push($allUs, $allP);
            }
            $cartValues = array();

            foreach($allUs as $cartV){
            if (in_array($cartV[0],$mainCart)) {
                $allCP = array($cartV[0],$cartV[1],$cartV[2],$cartV[3], $cartV[4]);
                array_push($cartValues, array($allCP, $myCart[$cartV[0]]));
            }
            }
             return view('checkout',['cart'=>$cartValues]);

        }
            return view('checkout');


   }
// delelete single product entry from cart by id
   function delProduct(Request $request){
         $email=$request->input('email');
         $user = DB::table('carts')->whereEmail($email)->first();
         if ($user) {
             $pid  = strval($user->product_barcodes);
             $splitPidStr = explode(',',$pid);
             if (($key = array_search($request->input('barcode'), $splitPidStr)) !== false) {
                  array_splice($splitPidStr, $key, 1);
            }
            $wholeStr = implode(",",$splitPidStr);

            $update = DB::table('carts')
               ->where('email',$email)
               ->update([
               'product_barcodes'=>$wholeStr,
               ]);
            return response()->json(['success'=>'Product deleted']);

         }

   }
   // Dellete All product with id entries
   function delAllProduct(Request $request){
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
