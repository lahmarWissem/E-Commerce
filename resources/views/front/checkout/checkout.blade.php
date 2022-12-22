@extends('front.layouts.inc.front')
@section('title')
   Checkout
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('cartview')}}">
                Cart
            </a>/
            <a href="{{url('checkout')}}">
                Checkout
            </a>
        </h6>
    </div>
</div>
<div class="container mt-5">
    <form action="{{url('place_order')}}" method="GET">
        {{ csrf_field() }}
    <div class="row checkout-form">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" value="{{Auth::guard('front')->user()->name}}" name="fname"placeholder="Enter first Name" >
                        </div>
                        <div class="col-md-6 ">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" value="{{Auth::guard('front')->user()->lname}}"  name="lname"placeholder="Enter Last Name" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{Auth::guard('front')->user()->email}}" name="email"placeholder="Enter Email " >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone Number </label>
                            <input type="text" class="form-control"  value="{{Auth::guard('front')->user()->phoneo}}"name="phoneo"placeholder="Enter Phone Number" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Adresse 1</label>
                            <input type="text" class="form-control"  value="{{Auth::guard('front')->user()->adresse1}}"name="adresse1"placeholder="Enter Adresse 1" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Adresse 2</label>
                            <input type="text" class="form-control"  value="{{Auth::guard('front')->user()->adresse2}}"name="adresse2"placeholder="Enter Adresse 2" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" class="form-control" value="{{Auth::guard('front')->user()->city}}" name="city"placeholder="Enter City" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">state</label>
                            <input type="text" class="form-control"  value="{{Auth::guard('front')->user()->state}}"name="state"placeholder="Enter state" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" class="form-control"  value="{{Auth::guard('front')->user()->country}}"name="country"placeholder="Enter Country" >
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">pin Code</label>
                            <input type="text" class="form-control"  value="{{Auth::guard('front')->user()->pincode}}"name="pincode"placeholder="Enter pin Code" >
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order details</h6>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                           
                   @foreach ($cartitem as $item)
                   <tr>
                          <td> {{$item->products->name}}</td>
                          <td>{{$item->prod_qty}}</td>
                          <td>{{$item->products->selling_price*$item->prod_qty}}</td>

                     
                        
                    @endforeach
                            </tr>
                        </tbody>

                    </table>
                    <hr>
                    <button type="submit"class="btn btn-primary float-end w-100"> Place Order</button>
                    

                </div>
            </div>
        </div>
    </form>
    </div>
</div>

@endsection