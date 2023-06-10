<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AdminCrud extends Controller
{
    //
    function addproduct(Request $request){
       $request->validate([
        'name'=>'required',
        'desc'=>'required|',
        'price'=>'required',
        'rating'=>'required',
        'availability'=>'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
       ]);
       $input = $request->all();
       $input['image'] = time().'.'.$request->image->extension();
       $request->image->move(public_path('images/featured'), $input['image']);

       $query = DB::table('products')->insert([
        'name'=>$input['name'],
        'desc'=>$input['desc'],
        'price'=>$input['price'],
        'rating'=>$input['rating'],
        'availability'=>$input['availability'],
        'image'=>$input['image'],
       ]);
    
        if ($query) {
            return response()->json(['success'=>'Product Inserted.']);
        } else {
            return response()->json(['failure'=>'Product Insertion Failed.']);
        }
     }

     function delproduct($id){
      $delete = DB::table('products')
      ->where('id',$id)
      ->delete();
      return response()->json(['success'=>'Product Deleted.']);
     }
     function deluser($email){
      $delete = DB::table('users')
      ->where('email',$email)
      ->delete();
      return response()->json(['success'=>'Product Deleted.']);
     }
     
     function produpdate(Request $request){
       $request->validate([
        'id'=>'required',
        'name'=>'required',
        'desc'=>'required|',
        'price'=>'required',
        'rating'=>'required',
        'availability'=>'required',
        'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        
    ]);
    $input = $request->all();
    $input['image'] = time().'.'.$request->image->extension();
    $request->image->move(public_path('images/featured'), $input['image']);

       $update = DB::table('products')
       ->where('id',$request->input('id'))
       ->update([
        'name'=>$input['name'],
        'desc'=>$input['desc'],
        'price'=>$input['price'],
        'rating'=>$input['rating'],
        'availability'=>$input['availability'],
        'image'=>$input['image']
       ]);

        if ($update) {
            return response()->json(['success'=>'Product Updated SuccessFully.']);
        } else {
            return response()->json(['failure'=>'Product Update Failed.']);
        }
     }
}
