<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class QuizHandler extends Controller
{
   function loginUser(Request $request){

   }
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

        $query = DB::table('questions')->insert([
            'level'=>$request->level,
            'type'=>$request->type,
            'question'=>$request->question,
            'option1'=>$request->option1,
            'option2'=>$request->option2,
            'option3'=>$request->option3,
            'option4'=>$request->option4,
            'answer'=>$request->answer,
        ]);
         print_r($validator);
        $validator?redirect('/auth/login'):
            redirect()->back()->withErrors($validator);
            return redirect()->back()->with('success', 'Question added successful!');

    }
    // Create Quiz Func
    function createQuiz(Request $request){
        $questions = DB::table('questions')
        ->where('level', $request->level)
        ->where('type', $request->type)
        ->select('id','type','question','level','option1','option2','option3','option4','answer')
        ->inRandomOrder()->limit($request->limit)->get();
        // add Questions and quiz data to Session
        session(['questions' => $questions],);
        $question_bank = [];
        foreach ($questions as $key => $value) {
            array_push($question_bank, $value->id);
        }
        session()->put('quiz_data',[
            'question_num' => 0,
            'score' => 0,
            'level' => intval($questions[0]->level),
            'type' => $questions[0]->type,
            'questions'=>$question_bank,
            'answers'=>[],
        ],);
        return redirect('/quiz/attempt');

    }
    // Quiz marker function
    function markQuiz(Request $quiz_submit){
        // Validate the posted data
        $validator=$quiz_submit->validate([
        'id'=>'required',
        'answer'=>'required',
        ]);
        if(session()->get('quiz_data.question_num')+1 <= count(session()->get('quiz_data.questions'))){
            // get question id and answer from request
            $id = $quiz_submit->id;
            $answer = $quiz_submit->answer;
            // find the question
            $question = DB::table('questions')->Where('id',$id)->first();
            // Get question num and score from session and add 1
            $question_num = intval($quiz_submit->session()->get('quiz_data.question_num'))+1;
            $score = intval($quiz_submit->session()->get('quiz_data.score'))+1;
            // Increment score if answer is correct
            if($question->answer == $answer){
                session()->put('quiz_data.score', $score);
                // session()->push('quiz_data.question', $question->id);
                // session()->push('quiz_data.answers', $answer);
            }
            session()->push('quiz_data.answers', $answer);
            // Redirect to score page if answer is last
            // return gettype(session()->get('quiz_data.score'));
            if($question_num > count(session()->get('questions'))-1){
                $query = DB::table('quizzes')->insert([
                'email'=>session()->get('user.email'),
                'level'=>session()->get('quiz_data.level'),
                'type'=> session()->get('quiz_data.type'),
                'questions'=>implode(",",session()->get('quiz_data.questions')),
                'answers'=>implode(",",session()->get('quiz_data.answers')),
                'score'=>strval(session()->get('quiz_data.score')),
            ]);
                return redirect('/quiz/score');
            }else {
                session()->put('quiz_data.question_num', $question_num);
            }
            // If validation retuens false return back with errors
            return $validator
                ?redirect()->back():
                redirect()->back()->withErrors($validator);
        }else{
            return redirect('/quiz/score');
        }

    }
    // Logout Auth
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
