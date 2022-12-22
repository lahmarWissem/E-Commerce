<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;

class ProductsController extends Controller

{

  
    public function show()
    {
        $category= Category::all();
        
        return view('setting.products.new',['category'=>$category]);
    }
    public function create()
    {   $category= Category::all();
        return view('setting.products.new',compact('category'));
    }

  
    public function destroy($id) 
    {
        $Products = Products::find($id); 
        $Products->delete(); 
       
        return redirect()->back()->withSuccess('Products deleted !!!');
    }
  
    
    public function store(Request $req)
    {
      
    $Products  = new Products;
    $Products ->cate_id = $req->cate_id;
    $Products ->name = $req->name;
    $Products ->slug = $req->slug;
    $Products ->small_description = $req->small_description;
    $Products ->description = $req->description;
    $Products ->original_price = $req->original_price;
    $Products ->selling_price = $req->selling_price;
    $Products ->quantity = $req->quantity;
    $Products ->taxprod = $req->taxprod;
    $Products ->status = $req->status == TRUE ? '1':'0';
    $Products ->trending = $req->trending== TRUE ? '1':'0';
    $Products ->meta_title = $req->meta_title;
    $Products ->meta_description = $req->meta_description	;
    $Products ->meta_keywords = $req->meta_keywords;
    
    $req->file('image_prod')->move(
        public_path('storage/images/'),
        $req->file('image_prod')->getClientOriginalName()
    );
    $Products ->image_prod=$req->file('image_prod')->getClientOriginalName();
    $Products ->save();
     
    
    return redirect()->back()->withSuccess('Products created !!!');
    }



    public function index() 
    {   
        $prod = Products::all();
      return view('setting.products.index', compact('prod'));
    }
    
    
    public function edit($id){ 
        $prod =  Products::find($id);
        return view('setting.products.edit',compact('prod'));  
    }
    public function update(Request $req,$id){
       
        $name = $req->input('name');
        $slug = $req->input('slug'); 
        $small_description = $req->input('small_description');
        $description = $req->input('description'); 
        $original_price = $req->input('original_price'); 
        $selling_price = $req->input('selling_price');
        $quantity = $req->input('quantity');
        $taxprod = $req->input('taxprod');      
        $status = $req->input('status')== TRUE ? '1':'0';
        $trending = $req->input('trending')== TRUE ? '1':'0';
        $meta_title = $req->input('meta_title');
        $meta_descrip = $req->input('meta_descrip');
        $meta_keywords = $req->input('meta_keywords');
        $item= Products::find($id);
        $path = '';
        if (request()->hasFile('image_prod')){
            request()->file('image_prod')->move(
                public_path('storage/images/'),
                request()->file('image_prod')->getClientOriginalName()
            );
            $path = request()->file('image_prod')->getClientOriginalName();
        }else{
            $path = $item->image_prod;
        }
        $item->update([
               
                 'name' => $name,
                 'slug' => $slug,
                 'small_description' => $small_description,
                 'description' => $description,
                 'original_price' => $original_price,
                 'selling_price' => $selling_price,
                 'quantity' => $quantity,
                 'taxprod' => $taxprod,
                 'status' => $status== TRUE ? '1':'0',
                 'trending' => $trending== TRUE ? '1':'0',
                 'meta_title' => $meta_title,
                 'meta_descrip' => $meta_descrip,
                 'meta_keywords' => $meta_keywords,
                 'image_prod' => $path,
             ]);
             return redirect()->back()->withSuccess('Products updated !!!');
    }
    

}

