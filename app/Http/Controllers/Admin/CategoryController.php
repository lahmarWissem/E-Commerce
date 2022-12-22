<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{    


  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.categories.newcategory');
    }
   
    
    public function store(Request $req)
    {
      
    $Category  = new Category ;
    $Category ->name = $req->name;
    $Category ->slug = $req->slug;
    $Category ->description = $req->description;
    $Category ->status = $req->status == TRUE ? '1':'0';
    $Category ->popular = $req->popular== TRUE ? '1':'0';
    $Category ->meta_title = $req->meta_title;
    $Category ->meta_descrip = $req->meta_descrip;
    $Category ->meta_keywords = $req->meta_keywords;
    
    $req->file('image_cat')->move(
        public_path('storage/images/'),
        $req->file('image_cat')->getClientOriginalName()
    );
    $Category ->image_cat=$req->file('image_cat')->getClientOriginalName();
    $Category ->save();
     
    return redirect()->back()->withSuccess('Category created !!!');
    }
    public function index()
    {
        $data= Category::all();
        return view('setting.categories.index',compact('data'));
    }
   
    public function destroy(Category $id){
        $Category = Category::find($id); 
        $Category->delete(); 
        return redirect()->back()->withSuccess('Category deleted !!!');
    }

    public function edit($id){ 
        $cat =  Category::find($id);
        return view('setting.categories.edit',compact('cat'));  
    }

    public function update(Request $req,$id){
        $name = $req->input('name');
        $slug = $req->input('slug');
        $description = $req->input('description');       
        $status = $req->input('status')== TRUE ? '1':'0';
        $popular = $req->input('popular')== TRUE ? '1':'0';
        $meta_title = $req->input('meta_title');
        $meta_descrip = $req->input('meta_descrip');
        $meta_keywords = $req->input('meta_keywords');
        $item= Category::find($id);
        $path = '';
        if (request()->hasFile('image_cat')){
            request()->file('image_cat')->move(
                public_path('storage/images'),
                request()->file('image_cat')->getClientOriginalName()
            );
            $path = request()->file('image_cat')->getClientOriginalName();
        }else{
            $path = $item->image_cat;
        }
        $item->update([
                 'name' => $name,
                 'slug' => $slug,
                 'description' => $description,
                 'status' => $status== TRUE ? '1':'0',
                 'popular' => $popular== TRUE ? '1':'0',
                 'meta_title' => $meta_title,
                 'meta_descrip' => $meta_descrip,
                 'meta_keywords' => $meta_keywords,
                 'image_cat' => $path,
             ]);
        return redirect()->back()->withSuccess('Category updated !!!');
    }
}
