@extends('front.layouts.inc.front')
@section('title',$Product->name)
    


@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <form action=" {{url('/add-rating')}} " method="post">
            @csrf
            <input type="hidden" name="product_id" value=" {{$Product->id}} ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Rate {{$Product->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="rating-css">
                <div class="star-icon">
                    @if ($user_rating)
                      @for($i=1 ; $i<=$user_rating->stars_rated ; $i++)
                      <input type="radio" value="{{$i}}" name="product_rating" checked id="{{$i}}">
                    <label for="{{$i}}" class="fa fa-star"></label>
                      @endfor
                      @for($j = $user_rating->stars_rated+1 ; $j<=5 ; $j++)
                      <input type="radio" value="{{$j}}" name="product_rating" id="{{$j}}">
                    <label for="{{$j}}" class="fa fa-star"></label>
                      @endfor

                    @else
                    <input type="radio" value="1" name="product_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="product_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="product_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="product_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="product_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                    @endif
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<meta name="_token" content="{{ csrf_token() }}">
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection /{{$Product->category->name}} /{{$Product->name}}</h6>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{asset('storage/images/'.$Product->image_prod)}}" class="w-100"alt="">

            </div>
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{$Product->name}}
                    @if ($Product->trending=='1')
                    <label for="" style="font-size: 16px" class="float-end badge bg-danger trending_tag">{{$Product->trending=='1'?'Trending':''}}</label>
                    @endif
                </h2>

                <hr>
                <label for="" class="me-3" style="color: red"> Original Price : <s > {{$Product->original_price}}</s>DT</label>
                <label for="" class="fw-bold"> Selling Price :  {{$Product->selling_price}} DT</label>
                <br> <br>
                @php
                 $rate_num = number_format($rating_value)
                @endphp
            <div class="rating">
                <b>({{$rating_value}})</b> &nbsp;
                @for($i=1 ; $i<=$rate_num ; $i++)
               <i class="fa fa-star fa-lg checked"></i>
               @endfor
               @for($j=$rate_num+1 ; $j<=5 ; $j++)
               <i class="fa fa-star fa-lg"></i>
               @endfor
               <span>
                &nbsp;
                   @if($ratings->count() > 0)
                  <b>{{$ratings->count()}} Ratings</b>&nbsp; &nbsp; &nbsp;
                   <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Rate this Product
                  </button>
                   @else
                       No Ratings &nbsp; &nbsp; &nbsp;
                       <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Rate this Product
                      </button>
                @endif
                </span>

             </div>

                <p class="me-3">
                    {!!$Product->small_description!!}
                </p>
                <hr>
                @if ($Product->quantity>0)
                    <label class="badge bg-success">In stock</label>
                @else 
                     <label class="badge bg-danger">Out of stock</label>
                @endif
                <div class="row mt-2">
                    <div class="col-md-3">
                        <input type="hidden" value="{{$Product->id}}" class="prod_id">
                        <label for="Quantity" >Quantity</label>
                        <div class="input-group text-center mb-3">
                            <span class="input-group-text decrement-btn">-</span>
                            <input type="text" name="quantity " class="form-control quantity-input text-center" value="1">
                            <span class="input-group-text increment-btn" >+</span>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <br/>
                        @if ($Product->quantity>0)
                        <button type="button" class="btn btn-primary me-3 addtocart float-start"> Add to Cart <i class="fa fa-cart-plus"></i></button>
                        @endif
                        
                    <button type="button" class="btn btn-success me-3  addtowishlist float-start">Add to Wishlist <span><i class="fa fa-heart"></i></span></button>

                    </div>

                </div>
            </div>

        </div>
        <div class="col-md-12">
            <hr>
            <h3>Description</h3>
            <p class="mt-3">
                {!! $Product->description !!}
            </p>

        </div>
     
    </div>
    </div>
</div>
@endsection
 
