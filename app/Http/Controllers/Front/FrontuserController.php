<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Rating;
use DB  ;
use Auth;

class FrontuserController extends Controller
{
    public function index()
    {   
        $featured= Products::where('trending','1')->take(15)->get();
        $trending= Category::where('popular','1')->take(15)->get();
        
        return view('front.layouts.index',compact('featured','trending'));
        
    }
 
    public function category()
    {   $category= Category::where('status','')->get();
        return view('front.layouts.category',compact('category'));
        
    }
    public function viewcategory($slug)
    {   if(Category::where('slug',$slug)->exists())
         { 
            $category=  Category::where('slug',$slug)->first();
            $Product= Products::where('cate_id', $category->id)->where('status','0')->get();
            return view('front.layouts.produits.viewcategory',compact('category','Product'));
         }else{
             return redirect('/')->with('status','Slug does not exists');
         }
       
         
    }



   
    public function productview($cate_slug , $prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Products::where('slug',$prod_slug)->exists())
        {   
            $Product =Products::where('slug',$prod_slug)->first();
            $ratings = Rating::where('prod_id', $Product->id)->get();
            $rating_sum = Rating::where('prod_id', $Product->id)->sum('stars_rated');
            $user_rating = Rating::where('prod_id', $Product->id)->where('user_id',Auth::guard('front')->id())->first();
            if($ratings->count() > 0)
            {
                $rating_value = $rating_sum/$ratings->count();
            }
            else
            {
                $rating_value = 0 ;
            }

            return view('front.layouts.produits.viewproduct', compact('Product','ratings','rating_value','user_rating'));
        }
        else
        {
            return redirect('/')->with('status','The link was broken');
        }
    }
    else
    {
        return redirect('/')->with('status','No such category found');
    }
}



    

    public function productlistajax()
    {
        $products=Products::select('name')->where('status','0')->get();
        $data=[];
        foreach($products as $item)
        {
            $data[]=$item['name'];
        }
        return $data;
    }
    public function searchProduct(Request $req)
    {
         $searched_product=$req->product_name;
         if($searched_product != "")
         {
            $products =Products::where('name','LIKE','%'.$searched_product.'%')->first();
                if($products)
                {   
                    return redirect('viewproduct/'.$products->category->slug.'/'.$products->slug);
                }else
                {
                    return redirect()->back()->with('status','No Products  matched your Search');
                }

         }else{
             return redirect()->back();
         }

        
    }
}
