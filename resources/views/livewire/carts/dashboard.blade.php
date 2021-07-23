<div>
   {{-- <x-app-layout> --}}
      <x-slot name="navbar">
         <div class="flex justify-between">
            <div>
               <a href="{{ url('/') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
               </a>
            </div>
            <div>
               <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Troli') }}
               </h2>
            </div>
         </div>
      </x-slot>
      <div class="">
         <div class="py-12">
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg md:max-w-7xl">
               <div class="md:flex ">
                  <div class="w-full p-4 px-5 py-5">
                     <div class="md:grid md:grid-cols-3 gap-2 ">
                        <div class="p-5">
                           <h1 class="text-xl font-medium ">Troli</h1>
                           @if(! empty($dataCart))
                           @foreach ($dataCart as $item)
                           <div class="flex justify-between items-center mt-6 pt-6 border-t">
                              <div class="cursor-pointer flex items-center" wire:click="selectProduct({{ $item['id'] }})">
                                 <img src="{{ $item['cover'] }}" width="60" height="60" class="rounded">
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
                           @endforeach
                           <div class="flex justify-between items-center mt-6 pt-6 border-t">
                              <a href="{{ url()->previous() }}" class="flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
   </svg> <span class="text-md font-medium text-blue-500">Continue Shopping</span> </a>
                              <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1"></span> <span class="text-lg font-bold text-gray-800 "> Rp{{ number_format($subtotal) }}</span> </div>
                           </div>
                           @else
                           <div class="text-center items-center">
                               <img class="my-4" src="{{ Storage::disk('s3')->url('icons/cart.svg') }}" alt="">
                               <span>Troli kamu masih kosong</span>
                           </div>
                           @endif
                        </div>
                        <div class="col-span-2">
                        <div class="p-5 rounded overflow-visible">
                           <span class="text-xl font-medium text-gray-800 block pb-3">Detail Penawaran</span>
                           @if($isSelectedProduct)
                               @livewire('offers.dashboard', ['mute' => false])
                               @else
                               <div class="text-center items-center pb-48 pt-36">
                                   <span class="text-gray-400">
                                       Klik produk untuk menambahkan detail penawaran
                                   </span>
                               </div>
                               @endif
                           </div>
                           <div class="text-right">
                               @if($isSelectedProduct)
                               <x-jet-button type="button" class="my-2 mx-1 bg-indigo-500 hover:bg-indigo-600 focus:border-indigo-600 active:bg-indigo-900" wire:click="saveDetails({{ $cartDetail['id'] }})" wire:loading.attr="disabled">
                                   {{ __('Save') }}
                               </x-jet-button>
                               @endif
                               @if(! empty($dataCart) && $isSaved)
                               <x-jet-button type="button" class="my-2 mx-1 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="negoAndnext" wire:loading.attr="disabled">
                                   {{ __('Lanjutkan & Nego') }}
                               </x-jet-button>
                               @endif
                           </div>
                       </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   {{-- </x-app-layout> --}}
</div>