<x-app-layout>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <title>@yield('title')</title>
    
            <!-- Fonts -->
            <link rel="stylesheet" href="{{ asset('css/app.css') }}">
            <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="{{ asset('/frontend/css/bootstrap5.css')}}">
            <link rel="stylesheet" href="{{ asset('/frontend/css/custom.css')}}">
            <link rel="stylesheet" href="{{ asset('/frontend/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{ asset('/frontend/css/owl.theme.default.min.css')}}">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
           
            <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
            <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css')}}" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
            <style>
                a{
                    text-decoration: none;
                    color: black;
                }
            </style>
        </head>
        <body >
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
                                                   <td>{{$item->price}}</td>
                                                   <td>
                                                       <img src="{{asset('storage/images/'.$item->products->image_prod)}}" width="50px" alt="">
                                                   </td>
                                               </tr>
                                               @endforeach
                                           </tbody>
                          
                                       </table>
                                       <h4 class="px-2">Grand Total : <span class="float-end"> {{$order->total_price}}</span></h4>
                                       <div class="mt-5">
                                       <label for="">Order Status</label>
                                       <form action="{{route('admin.orders.update',$order->id)}}" method="POST">
                                       @csrf
                                       @method('put')
                                       <select class="form-select" name="order_status">
                                        <option selected>Open this select menu</option>
                                        <option {{$order->status == '0' ?'selected':''}} value="0">Pending</option>
                                        <option  {{$order->status == '1' ?'selected':''}}value="1">Completed</option>
                                      </select>
                                      <br>
                                      <button type="submit" class="btn btn-primary w-100">Update</button>

                                      </form>
                                    </div>
                                    </div>
                                </div>
           
                               
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
         <script src="{{ asset('js/app.js') }}" defer></script>
         <script src="{{asset('../../frontend/js/bootstrap.bundle.min.js')}}"></script>
         <script src="{{asset('../../frontend/js/jquery-3.6.0.min.js')}}"></script>
         <script src="{{asset('../../frontend/js/owl.carousel.min.js')}}"></script>
         <script src="{{asset('../../frontend/js/custom.js')}}"></script>
         <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js')}}"></script>
         <script src="{{ asset('//cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
         @if (session('status'))
         <script>
           Swal.fire("{{session('status')}}");
         </script>
         
         @endif
    
    
         @yield('scripts')
        </body>
    </html>
    </x-app-layout>
     
    