@extends('front.layouts.inc.front')
@section('title')
    Category
@endsection

@section('content')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <h2>All Categories</h2>
                    @foreach ($category as $cat)
                         <div class="col-md-3 mb-3">
                            <a href="{{url('viewcategory/'.$cat->slug)}}">
                                <div class="card">
                                    <img src="{{asset('storage/images/'.$cat->image_cat)}}" width="" height="" alt="">
                                    <div class="card-body">
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
    </div>

@endsection

