<div>
   <div class="sm:flex items-center my-2 justify-between">
      <p tabindex="0" class="focus:outline-none text-base mx-2 sm:text-lg md:text-md lg:text-lg font-bold leading-normal text-gray-800">Penarikan Terakhir</p>
      <div>
         <x-jet-button class="ml-2 bg-pink-500 hover:bg-pink-600 focus:border-pink-600 active:bg-pink-900" wire:loading.attr="disabled">
            {{ __('Download') }}
         </x-jet-button>
      </div>
   </div>
   <div class="flex items-center w-full">
      <div class="bg-white h-96 shadow px-4 md:px-10 pt-4 md:pt-7 w-full pb-5 overflow-y-auto rounded-lg">
        @if(count($data['withdraw']) > 0) 
        <table class="w-full whitespace-nowrap">
            <thead>
               <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                  <th class="font-normal text-left pl-4">Waktu</th>
                  <th class="font-normal text-left pl-12">Nominal</th>
                  <th class="font-normal text-left pl-12">Status</th>
               </tr>
            </thead>
            <tbody class="w-full">
            @foreach ($data['withdraw'] as $item)
            <tr tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">
               <td class="pl-4 cursor-pointer">
                  <p class="font-medium">{{ $item['created_at']->format('F j, Y h:i a') }}</p>
               </td>
               <td class="pl-12">
                  <p class="text-sm font-medium leading-none text-gray-800">{{ 'Rp' . number_format($item['amount'], 0, ',', '.') }}</p>
               </td>
               <td class="pl-12">
                @if($item['status'])
                <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                    success
                </span>
                @else
                <span class="py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
                    pending
                </span>
                @endif
               </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else 
        <div class="flex flex-col">
            <div>
                <img src="{{ asset('/icons/payment.svg') }}" alt="">
            </div>
            <div>
                <p class="text-center">Belum ada penarikan</p>
            </div>
        </div>
        @endif
      </div>
   </div>
</div>