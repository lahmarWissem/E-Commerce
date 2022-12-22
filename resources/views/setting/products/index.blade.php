<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
        <div class="container mx-auto px-6 py-2">
            <div class="text-right">
              
                <a href="{{route('admin.products.create')}}" class="bg-blue-500 text-white font-bold px-5 py-1 rounded focus:outline-none shadow hover:bg-blue-500 transition-colors ">New Products</a>
             
            </div>
  
          <div class="bg-white shadow-md rounded my-6">
            <table class="text-left w-full border-collapse">
              <thead>
                <tr>
                  <th class="py-4 px-6 ">ID</th>
                  <th class="py-4 px-6 ">Name</th>
                  <th class="py-4 px-6 ">Categorie</th>
                  <th class="py-4 px-4 ">Description</th>
                  <th class="py-4 px-6 ">Original price</th>
                  <th class="py-4 px-6 ">Selling price</th>
                  <th class="py-4 px-6 ">Image</th>
                  <th class="py-4 px-6 ">Actions</th>
                </tr>
              </thead>
              <tbody>

                @foreach( $prod as $item)
                  <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">{{$item->id}}</td>
                    <td class="py-4 px-6 ">{{$item->name}}</td>
                    <td class="py-4 px-6 ">{{$item->category->name}}</td>
                    <td class="py-4 px-6 ">{{$item->description}}</td>
                    <td class="py-4 px-6 ">{{$item->original_price}}</td>
                    <td class="py-4 px-6 ">{{$item->selling_price}}</td>
                    <td class="py-4 px-6 ">
                        <div class="image" class="py-4 px-6 ">
                        <img src="{{asset('storage/images/'.$item->image_prod)}}" class="" alt="User Image" height= "100px" width="100px">
                        </div>
                    </td>
  
                    <td class="py-4 px-6 ">
                      <a href="{{route('admin.products.edit',$item->id)}}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">Edit</a>
  
                      
                      <form action="{{ route('admin.products.destroy',$item->id) }}" method="POST" class="inline">
                          @csrf
                          @method('delete')
                          <button class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark text-red-400">Delete</button>
                      </form>
                     
                    </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </main>
  </div>
</x-app-layout>