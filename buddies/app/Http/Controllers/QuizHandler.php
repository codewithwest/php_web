<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class QuizHandler extends Controller
{
    //Add Into Database function
   function addQuiz(Request $request){
        $validator = $request->validate([
            'level'=>'required',
            'question'=>'required',
            'option1'=>'required',
            'option2'=>'required',
            'option3'=>'required',
            'option4'=>'required',
            'answer'=>'required',
         ]);

         $query = DB::table('quizzes')->insert([
            'level'=>$request->input('level'),
            'type'=>$request->input('type'),
            'question'=>$request->input('question'),
            'option1'=>$request->input('option1'),
            'option2'=>$request->input('option2'),
            'option3'=>$request->input('option3'),
            'option4'=>$request->input('option4'),
            'answer'=>$request->input('answer'),

         ]);
         print_r($validator);
        $validator?redirect('/auth/login'):
              redirect()->back()->withErrors($validator);
         return redirect()->back()->with('success', ' Registration Successful!');

    }

    function markQuiz(Request $quiz_submit){

        $validator=$quiz_submit->validate([
        'id'=>'required',
        'answer'=>'required',
       ]);
      // get user email and pass from request
         $id = $quiz_submit->input('id');
         $answer = $quiz_submit->input('answer');
         // get users inventory
         $question = DB::table('quizzes')->Where('id',$id)->first();
         if ($question->answer == $answer){

            $question_num = intval($quiz_submit->session()->get('question_num'))+1;
            $score = intval($quiz_submit->session()->get('score'))+1;
            session()->put(['question_num' => $question_num]);
            session()->put(['score' => $score]);
            if ($question_num>4) {
                return   redirect('/quiz/score');
            }

            return redirect()->back();
         }else {
            return redirect()->back()->with('failure','Incorrect Answer');

         }
          redirect()->back()->withErrors($validator);
         // if user exist run check

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
               return $update?response()->json(['question_num'=>0])
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
