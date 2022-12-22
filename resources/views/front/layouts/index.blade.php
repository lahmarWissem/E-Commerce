@extends('front.layouts.inc.front')
@section('title')
    shopy
@endsection
@section('content')
@include('front.layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">
            <span ><h2>Trending Products</h2> </span> 
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($featured as $prod)
                <div class="item">
                    <div class="card">
                        
                        <img src="{{asset('storage/images/'.$prod->image_prod)}}" width="" height="" alt="">
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                            <span class="float-start" style="color: rgb(44, 126, 37)">{{$prod->selling_price}} TND</span>
                            <span class="float-end" style="color: red"><s>{{$prod->original_price}} TND</s></span>
                        </div>
                   
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <span ><h2>Trending Categories</h2> </span> 
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($trending as $cat)
                <div class="item">
                <a href="{{url('viewcategory/'.$cat->slug)}}">
                    <div class="card">
                        <img src="{{asset('storage/images/'.$cat->image_cat)}}" width="150px" height="250px" alt="">
                       <div  class="card-body">
                             <h5>{{$cat->name}}</h5>
                             <p>
                                {{$cat->description}}
                             </p>
                       </div>
                    </div>
                </a>
                </div>
            
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    </script>

@endsection
