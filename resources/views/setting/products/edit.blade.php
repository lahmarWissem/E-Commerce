<x-app-layout>
    <div>
         <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
             <div class="container mx-auto px-6 py-1 pb-16">
               <div class="bg-white shadow-md rounded my-6 p-5">
                 <form method="POST" action="{{ route('admin.products.update',$prod->id)}}" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                   <h3 class="text-xl my-4 text-gray-600">Category</h3>
                <div class="grid grid-cols-3 gap-4">
                  <div class="relative inline-flex">
                    <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232"><path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero"/></svg>
                    <select name="cate_id" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="publish">
            
                    
                      <option value="">{{$prod->category->name}}</option>  
                  
                      
                    </select>
                  </div>
                </div>
                   <div class="flex flex-col space-y-2">
                     <label for="name" class="text-gray-700 select-none font-medium"> Name</label>
                     <input id="name" type="text" name="name" value="{{$prod->name}}"
                       placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                     />
                 </div>
         
                 <div class="flex flex-col space-y-2">
                     <label for="slug" class="text-gray-700 select-none font-medium">Slug</label>
                     <input id="slug" type="text" name="slug"value="{{$prod->slug}}"
                       placeholder="Enter slug" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                     />
                 </div>
                 <div class="flex flex-col space-y-2">
                    <label for="small_description" class="text-gray-700 select-none font-medium">small_description</label>
                    <input id="small_description" type="text" name="small_description"value="{{$prod->small_description}}"
                      placeholder="Enter small description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                 <div class="flex flex-col space-y-2">
                    <label for="description" class="text-gray-700 select-none font-medium">Description</label>
                    <input id="description" type="text" name="description" value="{{$prod->description}}"
                      placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="original_price" class="text-gray-700 select-none font-medium">original_price</label>
                    <input id="original_price" type="text" name="original_price" value="{{$prod->original_price}}"
                      placeholder="Enter selling price" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="selling_price" class="text-gray-700 select-none font-medium">selling_price</label>
                    <input id="selling_price" type="text" name="selling_price" value="{{$prod->selling_price}}"
                      placeholder="Enter selling price" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <div class="form-group" style="margin-right: 3rem;">
                    <label for="image_prod">Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail1"name="image_prod"value="{{$prod->image_prod}}" placeholder="Enter image cat">
                   
                  </div>
                <div class="flex flex-col space-y-2">
                    <label for="quantity" class="text-gray-700 select-none font-medium">Quantity</label>
                    <input id="quantity" type="text" name="quantity" value="{{$prod->quantity}}"
                      placeholder="Enter Quantity " class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="taxprod" class="text-gray-700 select-none font-medium">Tax</label>
                    <input id="taxprod" type="text" name="taxprod" value="{{$prod->taxprod}}"
                      placeholder="Enter Quantity " class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <h3 class="flex flex-col space-y-2 ">Status</h3>
                <div class="grid grid-cols-3 gap-4">
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" {{$prod->status== "1" ? 'checked': ''}} class="form-checkbox h-5 w-5 text-blue-600" name="status" 
                                  ><span class="ml-2 text-gray-700"></span>
                              </label>
                          </div>
                      </div>
                </div>
                <h3 class="flex flex-col space-y-2 ">trending</h3>
                 <div class="grid grid-cols-1 gap-2">
                       <div class="flex flex-col justify-cente">
                           <div class="flex flex-col">
                               <label class="inline-flex items-center mt-3">
                                   <input type="checkbox"{{$prod->trending== "1" ? 'checked': ''}}  class="form-checkbox h-5 w-5 text-blue-600" name="trending" 
                                   ><span class="ml-2 text-gray-700"></span>
                               </label>
                           </div>
                       </div>
                 </div>
                 <div class="flex flex-col space-y-2">
                     <label for="meta_title" class="text-gray-700 select-none font-medium">Meta title</label>
                     <input id="meta_title" type="text" name="meta_title" value="{{$prod->meta_title}}"
                       placeholder="Enter meta title" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                     />
                 </div>
                 <div class="flex flex-col space-y-2">
                    <label for="meta_keywords" class="text-gray-700 select-none font-medium">Meta keywords</label>
                    <input id="meta_keywords" type="text" name="meta_keywords" value="{{$prod->meta_keywords}}"
                      placeholder="Enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="meta_description	" class="text-gray-700 select-none font-medium">Meta description</label>
                    <input id="meta_description	" type="text" name="meta_description" value="{{$prod->meta_description}}"
                      placeholder="Enter meta_keywords" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                 
  
                
 
                 
                 <div class="text-center mt-16 mb-16">
                   <button type="ADD Category" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">Submit</button>
                 </div>
               </div>
 
              
             </div>
         </main>
     </div>
 </div>
 </x-app-layout>