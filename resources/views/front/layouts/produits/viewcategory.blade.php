@extends('front.layouts.inc.front')
@section('title')

@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection /{{$category->name}}</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
           <h2>{{$category->name}}</h2> 
                @foreach ($Product as $prod)
            <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{url('viewproduct/'.$category->slug.'/'.$prod->slug)}}">
                        <img src="{{asset('storage/images/'.$prod->image_prod)}}" width="" height="" alt="">
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                            <span class="float-start" style="color: green">{{$prod->selling_price}} DT</span>
                            <span class="float-end" style="color: red"><s>{{$prod->original_price}} Dt</s></span>
                       </div>
                    </a>
                  </div>
            </div> 
                @endforeach
            
        </div>
    </div>
</div>
@endsection