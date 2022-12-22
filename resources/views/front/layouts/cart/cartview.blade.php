@extends('front.layouts.inc.front')
@section('title')
    My Cart
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
            </a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow ">
        @if ($cartItem->count()>0)
        <div class="card-body">
            @php
             $total=0;
             @endphp
            @foreach ($cartItem as $item)
             
            <div class="row product_data ">
                <div class="col-md-2 my-auto">
                    <img src="{{asset('storage/images/'.$item->products->image_prod)}}" width="70px"height="70px" alt="">
                </div>
                <div class="col-md-3 my-auto">
                    <h3>{{$item->products->name}}</h3>
                </div>
                <div class="col-md-2 my-auto">
                    <h3>{{$item->products->selling_price}} DT</h3>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                    @if ($item->products->quantity >=$item->prod_qty)
                    <label for="Quantity" >Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px">
                        <button class="input-group-text changeqty decrement-btn">-</button>
                        <input type="text" name="quantity " class="form-control quantity-input text-center" value="{{$item->prod_qty}}">
                        <button class="input-group-text changeqty increment-btn" >+</button>
                    </div>
                    @php
                      $total+=$item->products->selling_price*$item->prod_qty;
                    @endphp
                    
                    @else
                    <h6 class="btn btn-danger">Out Of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <h3 class="btn btn-danger delete-cart-item"><i class="fa fa-trash "></i> Remove</h3>
                </div>
            </div>
          
            @endforeach 
        </div>
        <div class="card-footer ">
            <h6>Total Price {{$total}} DT
            <a href="{{url('checkout')}}" class="btn btn-outline-success float-end my-auto">Proceed To Checkout</a>
            </h6>
         
        </div>
        @else
        <div class="card-body text-center">
            <h2>your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
            <a href="{{url('category')}}" class="btn btn-primary float-end"> Continue To Shopping</a>

        </div>
        @endif

    </div>
</div>

@endsection