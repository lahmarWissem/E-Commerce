<?php

namespace App\Http\Controllers\Admin;

use App\Models\Frontuser;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        
        $usercount = Frontuser::count();
        $money = Order::where('status','1')->sum('total_price');
        $orders = Order::where('status','0')->count();
        $product = Products::count();
        $outstock = Products::where('quantity','0')->count();
        $stock = Products::where('quantity','>','0')->count();
        return view('index',compact('usercount','money','orders','product','outstock','stock'));
    }

  

}