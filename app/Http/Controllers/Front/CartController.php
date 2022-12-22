<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\front_auth;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Frontuser;
use App\Models\Wishlist;
use DB;
use Auth;


class CartController extends Controller
{


   public function add(Request $req)
   {
      $product_id=$req->input ('product_id');
      $product_qty=$req->input ('product_qty');
      if(Auth::guard('front')->check())
      {
          $prod_check=Products::where('id',$product_id)->first();
          if($prod_check)
          {    
              if(Cart::where('prod_id',$product_id)->where('user_id',Auth::guard('front')->id())->exists())
              {
                return response()->json(['status'=>$prod_check->name." Already Added to cart "]);
              }else{
              $cartitem=new Cart();
              $cartitem->prod_id=$product_id;
              $cartitem->user_id=Auth::guard('front')->id();
              $cartitem->prod_qty=$product_qty;
              $cartitem->save();
             return response()->json(['status'=>$prod_check->name." Added to cart "]);
            }
          }
      }else
      {
          return  response()->json(['status'=>'Login to Continue']);
      }
   }

   public function cartfunction()
   {
      $cartItem=Cart::where('user_id',Auth::guard('front')->id())->get();
      return view('front.layouts.cart.cartview',compact('cartItem'));
   }

   public function deleteproduct(Request $req)
   { 
        if(Auth::guard('front')->check())
        {
            $prod_id=$req->input('prod_id');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::guard('front')->id())->exists())
            {
                  $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::guard('front')->id())->first();
                  $cartItem->delete();
                  return  response()->json(['status'=>'Product Deleted successfuly']);
            }
        }else
        {
          return  response()->json(['status'=>'Login to Continue']);
        }
     
     
   }
public function updatecart(Request $req)
{
  if(Auth::guard('front')->check())
        {
          $prod_id=$req->input ('prod_id');
          $product_qty=$req->input ('prod_qty');
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::guard('front')->id())->exists())
            {
                  $cart=Cart::where('prod_id',$prod_id)->where('user_id',Auth::guard('front')->id())->first();
                  $cart->prod_qty=$product_qty;
                  $cart->update();
                  return  response()->json(['status'=>'Quantity Updated']);
            }
        }
}
public function cartcount()
{
  $cartcount= Cart::where('user_id',Auth::guard('front')->id())->count();
  return  response()->json(['count'=>$cartcount]);
  
}



}
 