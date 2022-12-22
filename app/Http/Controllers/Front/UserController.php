<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use DB;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $orders=Order::where('user_id',Auth::guard('front')->id())->get();
        return view('front.orders.vieworders',compact('orders'));
    }
    public function show($id)

    {
        $order= Order::where('id',$id)->where('user_id',Auth::guard('front')->id())->first();
        return view('front.orders.view-order',compact('order'));
    }

    
}
