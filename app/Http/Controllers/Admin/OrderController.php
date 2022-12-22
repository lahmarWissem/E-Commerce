<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {   $orders= Order::where('status','0')->get();
       return view('setting.orders.index',compact('orders'));
    }
    public function show($id)
    {   $order= Order::where('id',$id)->first();
       return view('setting.orders.view',compact('order'));
    }
    public function update(Request $req ,$id){ 
        $orders =  Order::find($id);
        $orders->status=$req->input('order_status');
        $orders->update();
        return redirect('admin/orders')->with('status','orders Updated Successfuly');
    }
}
