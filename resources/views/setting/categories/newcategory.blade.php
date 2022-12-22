<x-app-layout>
    <div>
         <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
             <div class="container mx-auto px-6 py-1 pb-16">
               <div class="bg-white shadow-md rounded my-6 p-5">
                 <form method="POST" action="{{ route('admin.category.store')}}" enctype="multipart/form-data">
                   @csrf
                   @method('post')
                   <div class="flex flex-col space-y-2">
                     <label for="name" class="text-gray-700 select-none font-medium"> Name</label>
                     <input id="name" type="text" name="name" 
                       placeholder="Enter name" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                     />
                 </div>
         
                 <div class="flex flex-col space-y-2">
                     <label for="slug" class="text-gray-700 select-none font-medium">Slug</label>
                     <input id="slug" type="text" name="slug"
                       placeholder="Enter slug" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                     />
                 </div>
                 <div class="flex flex-col space-y-2">
                    <label for="description" class="text-gray-700 select-none font-medium">Description</label>
                    <input id="description" type="text" name="description" 
                      placeholder="Enter description" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <h3 class="flex flex-col space-y-2 ">Status</h3>
                <div class="grid grid-cols-3 gap-4">
                      <div class="flex flex-col justify-cente">
                          <div class="flex flex-col">
                              <label class="inline-flex items-center mt-3">
                                  <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="status" 
                                  ><span class="ml-2 text-gray-700"></span>
                              </label>
                          </div>
                      </div>
                </div>
                <h3 class="flex flex-col space-y-2 ">Popular</h3>
                 <div class="grid grid-cols-1 gap-2">
                       <div class="flex flex-col justify-cente">
                           <div class="flex flex-col">
                               <label class="inline-flex items-center mt-3">
                                   <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="popular" 
                                   ><span class="ml-2 text-gray-700"></span>
                               </label>
                           </div>
                       </div>
                 </div>
                 <div class="flex flex-col space-y-2">
                     <label for="meta_title" class="text-gray-700 select-none font-medium">Meta title</label>
                     <input id="meta_title" type="text" name="meta_title" 
                       placeholder="Enter meta title" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                     />
                 </div>
                 <div class="flex flex-col space-y-2">
                    <label for="meta_descrip" class="text-gray-700 select-none font-medium">Meta description</label>
                    <input id="meta_descrip" type="text" name="meta_descrip" 
                      placeholder="Enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="meta_keywords" class="text-gray-700 select-none font-medium">Meta keywords</label>
                    <input id="meta_keywords" type="text" name="meta_keywords" 
                      placeholder="Enter password" class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    />
                </div>
                 
  
                 <div class="form-group" style="margin-right: 3rem;">
                    <label for="image_cat">Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail1"name="image_cat" placeholder="Enter image cat">
                   
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