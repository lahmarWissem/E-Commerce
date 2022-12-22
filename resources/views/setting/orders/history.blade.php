<x-app-layout>
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 px-4">
  
          <div class="bg-white shadow-md rounded my-10 px-6">
            <table class="text-left w-full border-collapse">
              <thead>
                <tr>
                    <th class="py-4 px-6 ">Tracking Number</th>
                    <th class="py-4 px-6 ">Totale Price</th>
                    <th class="py-4 px-6 ">Status</th>
                    <th class="py-4 px-6 ">Action</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($orders as $item)
                  <tr class="hover:bg-grey-lighter">
                    
                        <td class="py-4 px-6 ">{{$item->tracking_no}}</td>
                        <td class="py-4 px-6 ">{{$item->total_price}}</td>
                        <td class="py-4 px-6 ">{{$item->status == 0 ?'Pending':'Completed'}}</td>
                        <td class="py-4 px-6 "><a href="{{ route('admin.orders.show',$item->id) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark text-blue-400">View</a></td>
                        
                   
                  </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
    </main>

</x-app-layout>