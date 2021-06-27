<div>
   <div class="h-screen">
      <div class="py-12">
         <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-7xl">
            <div class="md:flex ">
               <div class="w-full p-4 px-5 py-5">
                  <div class="md:grid md:grid-cols-3 gap-2 ">
                     <div class="p-5">
                        <h1 class="text-xl font-medium ">Cart</h1>
                        @forelse ($dataCart as $item)
                        <div class="flex justify-between items-center mt-6 pt-6 border-t">
                           <div class="flex items-center">
                              <img src="{{ $item['cover'] }}" width="60" class="rounded-full ">
                              <div class="flex flex-col ml-3"> <span class="md:text-md font-medium">{{ $item['title'] }}</span> <span class="text-xs font-light text-gray-400">{{ $item['subcategory'] }}</span> </div>
                           </div>
                           <div class="flex justify-center items-center">
                              <div class="pr-8 "> <span class="text-xs font-medium">Rp{{ number_format($item['price']) }}</span> </div>
                              <div>
                                 <x-delete-button wire:click="deleteCart({{ $item['id'] }})" class="bg-red-500 hover:bg-red-600 focus:border-red-600 active:bg-red-900" >
                                    {{ __('Delete') }}
                                 </x-delete-button>
                              </div>
                           </div>
                        </div>
                        @empty
                            
                        @endforelse

                        <div class="flex justify-between items-center mt-6 pt-6 border-t">
                           <a href="{{ url()->previous() }}" class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
</svg> <span class="text-md font-medium text-blue-500">Continue Shopping</span> </a>
                           <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1"></span> <span class="text-lg font-bold text-gray-800 "> Rp{{ number_format($subtotal) }}</span> </div>
                        </div>
                     </div>
                     <div class="col-span-2  p-5 bg-gray-800 rounded overflow-visible">
                        <span class="text-xl font-medium text-gray-100 block pb-3">Order Details</span>
                        <div class="grid grid-cols-3 gap-2 pt-2 mb-3">
                           <div class="flex justify-center flex-col pt-3 col-span-2">
                              <label class="text-xs text-gray-400 ">Mau ketemu penjualnya?</label>
                              <x-switch-button wire:model="meetSeller" />
                           </div>
                           <div class="flex justify-center flex-col pt-3">
                              <label class="text-xs text-gray-400 ">Kapan kamu pengen kontrak ini berakhir?</label> 
                              <x-jet-input type="date" class="mt-1 block w-full border-gray-600 bg-gray-800 text-gray-400"
                                 x-ref="namaproject"
                                 wire:model="namaproject" />
                           </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 pt-2 mb-3">
                            @if($meetSeller)
                           <div class="flex justify-center flex-col pt-3">
                              <label class="text-xs text-gray-400 ">Kapan mau ketemu penjualnya?</label> 
                              <x-jet-input type="date" class="mt-1 block w-full border-gray-600 bg-gray-800 text-gray-400"
                                 x-ref="namaproject"
                                 wire:model="namaproject" />
                           </div>
                           <div class="flex justify-center flex-col pt-3">
                              <label class="text-xs text-gray-400 ">Jam berapa?</label> 
                              <x-jet-input type="time" class="mt-1 block w-full border-gray-600 bg-gray-800 text-gray-400"
                                 x-ref="namaproject"
                                 wire:model="namaproject" />
                           </div>
                           <div class="grid lg:grid-cols-4 grid-cols-1 col-span-3">
                              <div class="flex justify-center flex-col col-span-3 pt-3">
                                 <label class="text-xs text-gray-400 ">Lokasinya dimana?</label>
                                 <x-jet-input type="text" class="mt-1 block w-full border-gray-600 bg-gray-800 text-gray-400"
                                    x-ref="namaproject"
                                    wire:model="namaproject" />
                              </div>
                              <div class="flex justify-center flex-col pt-3">
                                 <x-jet-button type="button" class="mx-1 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900 py-3 mt-5 justify-center" wire:click="continue" wire:loading.attr="disabled">
                                    {{ __('Cari di maps') }}
                                 </x-jet-button>
                              </div>
                           </div>
                           @endif
                           <div class="col-span-3">
                              <label class="text-xs text-gray-400 ">Jelaskan detail pekerjaan yang ingin kamu berikan</label>          
                              <x-simple-textarea-field type="text" class="mt-1 block w-full border-gray-600 bg-gray-800 text-gray-400"
                                 rows="5"
                                 placeholder="{{ __('Aku pengen fotoan kayak...') }}"
                                 x-ref="deskripsi"
                                 maxlength="200"
                                 wire:model="deskripsi">
                              </x-simple-textarea-field>
                           </div>
                        </div>
                        <button class="h-12 w-full bg-blue-500 rounded focus:outline-none text-white hover:bg-blue-600 duration-500">Lanjutkan & Nego</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>