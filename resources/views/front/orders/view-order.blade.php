@extends('front.layouts.inc.front')
@section('title')
   My Orders
@endsection
@section('content')
 <div class="container py-5">
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <div class="card-header bg-warning">
                    <h4 class="text-white">View Orders
                        <a href="{{url('/')}}" class="btn btn-dark float-end"> back</a>
                    </h4>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6 order-details">
                             <h4>Shipping Details</h4>
                             <hr>
                           <label for=""> First Name</label>
                           <div class="border">{{$order->fname}}</div>
                           <label for=""> Last Name</label>
                           <div class="border">{{$order->lname}}</div>
                           <label for=""> Email </label>
                           <div class="border">{{$order->email}}</div>
                           <label for=""> Phone</label>
                           <div class="border">{{$order->phoneo}}</div>
                           <label for=""> Shipping Adresse</label>
                           <div class="border">
                               {{$order->adresse1}},<br>
                               {{$order->adresse2}},<br>
                               {{$order->city }},<br>
                               {{$order->state}},
                               {{$order->country}},
                               
                            </div>
                            <label for=""> Pin Code</label>
                           <div class="border p-2">
                               {{$order->pincode}}
                              
                               
                            </div>
                         </div>
                         <div class="col-md-6">
                            <table class="table table-bordered ">
                                <h4>Shipping Details</h4>
                                <hr>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity </th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderitem as $item)
                                        
                                    
                                    <tr>
                                        <td>{{$item->products->name}}</td>
                                        <td>{{$item->products->quantity}}</td>
                                        <td>{{$item->total_price}}</td>
                                        <td>
                                            <img src="{{asset('storage/images/'.$item->products->image_prod)}}" width="50px" alt="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
               
                            </table>
                            <h4 class="px-2">Grand Total : <span class="float-end"> {{$order->total_price}}</span></h4>
                         </div>
                     </div>

                    
                 </div>
             </div>
            
         </div>
     </div>
 </div>
@endsection