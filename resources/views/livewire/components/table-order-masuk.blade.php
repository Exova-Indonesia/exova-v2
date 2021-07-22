<div>
   <div class="w-full">
      <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
         <div class="sm:flex items-center justify-between">
            <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Tawaran Masuk</p>
         </div>
      </div>
      <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 h-96 overflow-y-auto">
         @if(count($orders) > 0)
         <table class="w-full whitespace-nowrap">
            <thead>
               <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                  <th class="font-normal text-left pl-4">Project</th>
                  <th class="font-normal text-left pl-12">Status</th>
                  <th class="font-normal text-left pl-20">Price</th>
                  <th class="font-normal text-left pl-20">Created At</th>
               </tr>
            </thead>
            <tbody class="w-full">
                @foreach ($orders as $item)
                <tr wire:click="openProject(`{{ $item['uuid'] }}`)" tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">
                   <td class="pl-4 cursor-pointer">
                      <div class="flex items-center">
                         <div>
                            <p class="font-medium">{{ $item['title'] }}</p>
                            <p class="text-xs leading-3 text-gray-600 pt-2">{{ $item['description'] }}</p>
                         </div>
                      </div>
                   </td>
                   <td class="pl-12">
                       @if($item['status'] == App\Models\OrderRequest::IS_REQUESTED)
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Requested
                      </span>
                      @elseif($item['status'] == App\Models\OrderRequest::IS_APPROVED)
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        Approved
                      </span>
                      @else
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        Declined
                      </span>
                      @endif
                   </td>
                   <td class="pl-20">
                      <p class="font-medium">{{ 'Rp' . number_format($item['price'], 0, ',', '.') }}</p>
                   </td>
                   <td class="pl-20">
                      <p class="font-medium">{{ $item['created_at']->format('F j, Y h:i a') }}</p>
                   </td>
                </tr>
                @endforeach
            </tbody>
         </table>
        @else
        <div class="flex flex-col">
            <div class="m-auto">
               <img src="{{ Storage::disk('s3')->url('icons/emtproduct.svg') }}" alt="">
            </div>
            <div>
               <p class="py-2 text-center">Tidak ada data</p>
            </div>
        </div>
        @endif
      </div>
   </div>
</div>