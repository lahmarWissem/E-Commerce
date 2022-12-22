<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Frontuser;
use App\Models\Order;
use App\Models\OrderItem;
use DB;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
    $old_cartitem= Cart::where('user_id',Auth::guard('front')->id())->get();
    foreach($old_cartitem as $item)
    {
        if(!Products::where('id',$item->prod_id)->where('quantity','>=',$item->prod_qty)->exists())
        {
               $removeitem= Cart::where('user_id',Auth::guard('front')->id())->where('prod_id',$item->prod_id)->first();
               $removeitem->delete();
        }
    }
    $cartitem= Cart::where('user_id',Auth::guard('front')->id())->get();
    return view('front.checkout.checkout',compact('cartitem'));
    }

    public function placeorder(Request $req)
    {
        $order=new Order();
        $order->user_id=Auth::guard('front')->id();
        $order->fname=$req->input('fname');
        $order->lname=$req->input('lname');
        $order->email=$req->input('email');
        $order->phoneo=$req->input('phoneo');
        $order->adresse1=$req->input('adresse1');
        $order->adresse2=$req->input('adresse2');
        $order->city=$req->input('city');
        $order->state=$req->input('state');
        $order->country=$req->input('country');
        $order->pincode=$req->input('pincode');
        //calcule de totale prix
        $total=0;
        $cartitem_total= Cart::where('user_id',Auth::guard('front')->id())->get();
        foreach($cartitem_total as $prod)
        {
            $total +=$prod->products->selling_price*$prod->prod_qty;
        }
        $order->total_price=$total;
        $order->tracking_no='wissem'.rand(1111,9999);
        $order->save();

        $order->id;
        $cartitem= Cart::where('user_id',Auth::guard('front')->id())->get();
        foreach($cartitem as $item)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->selling_price,


            ]);
            $prod=Products::where('id',$item->prod_id)->first();
            $prod->quantity=$prod->quantity - $item->prod_qty;
            $prod->update();
        }
        if(Auth::guard('front')->user()->adresse1==NULL)
        {
        $user=Frontuser::where('id',Auth::guard('front')->id())->first();
        $user->name=$req->input('fname');
        $user->lname=$req->input('lname');
        $user->phoneo=$req->input('phoneo');
        $user->adresse1=$req->input('adresse1');
        $user->adresse2=$req->input('adresse2');
        $user->city=$req->input('city');
        $user->state=$req->input('state');
        $user->country=$req->input('country');
        $user->pincode=$req->input('pincode');
        $user->update();
        }
        $cartitem= Cart::where('user_id',Auth::guard('front')->id())->get();
        Cart::destroy($cartitem);
        return  redirect('/')->with('status','Order placed successfuly');
    }
}
