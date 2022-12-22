<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Wishlist;


use DB;
use Auth;
class WishlistController extends Controller
{
    public function index()
    {   $wishlist= Wishlist::where('user_id',Auth::guard('front')->id())->get();
        return view('front.layouts.wishlist.wishlist',compact('wishlist'));
    }
    public function add(Request $req)
    {
        
      
      if(Auth::guard('front')->check())
      {
          $prod_id=$req->input ('product_id');
          
           
        if(Products::find($prod_id))
        {
              $wish= new Wishlist();
              $wish->prod_id=$prod_id;
              $wish->user_id=Auth::guard('front')->id();
              $wish->save();
             return response()->json(['status'=>" Added to wishlist "]);
              
        }
        else{
            return  response()->json(['status'=>'Product does not exist']);

         }
        }
      else
      {
          return  response()->json(['status'=>'Login to Continue']);
      }
        
    }

    public function deleteitem(Request $req)
    {
        if(Auth::guard('front')->check())
        {
            $prod_id=$req->input('prod_id');
            if(Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::guard('front')->id())->exists())
            {
                  $wish=Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::guard('front')->id())->first();
                  $wish->delete();
                  return  response()->json(['status'=>'Item Deleted From Wishlist']);
            }
        }else
        {
          return  response()->json(['status'=>'Login to Continue']);
        }
    }
    public function loadwishlist()
        {
  $wishcount= Wishlist::where('user_id',Auth::guard('front')->id())->count();
  return  response()->json(['count'=>$wishcount]);
  
       }
}
