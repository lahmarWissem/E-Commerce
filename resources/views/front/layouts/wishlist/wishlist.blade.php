@extends('front.layouts.inc.front')
@section('title')
My Wishlist
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a>/
            <a href="{{url('wishlist')}}">
                Wishlist
            </a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow ">
        <div class="card-body">
        
   @if ($wishlist->count()>0)
      @foreach ($wishlist as $item)
     
      <div class="row product_data ">
        <div class="col-md-2 my-auto">
            <img src="{{asset('storage/images/'.$item->products->image_prod)}}" width="70px"height="70px" alt="">
        </div>
        <div class="col-md-2 my-auto">
            <h3>{{$item->products->name}}</h3>
        </div>
        <div class="col-md-2 my-auto">
            <h3>{{$item->products->selling_price}} DT</h3>
        </div>
        <div class="col-md-2 my-auto">
            <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
            @if ($item->products->quantity >=$item->prod_qty)
            
            <div class="input-group text-center mb-3">
                <span class="input-group-text decrement-btn">-</span>
                <input type="text" name="quantity " class="form-control quantity-input text-center" value="1">
                <span class="input-group-text increment-btn" >+</span>
            </div>           
            @else
            <h6 class="btn btn-danger">Out Of Stock</h6>
            @endif
        </div>
        <div class="col-md-2 my-auto">
            <button type="button" class="btn btn-primary me-3 addtocart float-start"> Add to Cart <i class="fa fa-cart-plus"></i></button>
        </div>
        <div class="col-md-2 my-auto">
            <button class="btn btn-danger remove-wishlist-item "><i class="fa fa-trash "></i> Remove</button>
        </div>
    
  
    @endforeach 
</div>

   @else
       <h4>There are no Products in Your WishList</h4>
   @endif
        
</div>
    </div>
</div>

@endsection