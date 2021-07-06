<div>
   <div class="">
                      <div class="chat-header bg-red-500 border-red-300 border-b px-6 py-4 flex flex-row flex-none justify-center items-center">
                  <div class="flex">
                     <div class="text-sm text-gray-100">

                        <p>{{ __('Good news! Khusus untuk kamu, boleh bayar banyak kontrak dalam sekali klik') }}
                        </p>
                     </div>
                  </div>
               </div>
               <div class="py-12">
                   <div class="max-w-md mx-auto bg-gray-100 shadow-lg rounded-lg md:max-w-7xl">
                       <div class="md:flex ">
                           <div class="w-full p-4 px-5 py-5">
                  <div class="md:grid md:grid-cols-3 gap-2 ">
                     <div class="p-5 col-span-2">
                        <h1 class="text-xl font-medium ">Kontrak</h1>
                        <div class="w-full h-96 overflow-x-scroll xl:overflow-x-hidden">
                           <table class="min-w-full dark:bg-gray-800">
                              <thead>
                                 <tr class="w-full h-16 border-gray-300 border-b py-8">
                                    <th class="pl-8 text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                                       <input wire:model="selectAll" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2  focus:ring-gray-400" />
                                    </th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Project Name</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Price</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Meet Seller</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Due Date</th>
                                    <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Meet Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                @foreach ($data as $item)
                                <tr class="h-24 border-gray-300 border-b">
                                   <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                      <input wire:model="selectedProducts" value="{{ $item['id'] }}" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:ring-2  focus:ring-gray-400" />
                                   </td>
                                   <td class="pr-4 cursor-pointer">
                                      <div class="flex items-center">
                                         <div>
                                            <p class="font-medium">{{ $item['requests']['title'] }}</p>
                                            <p class="text-xs leading-3 text-gray-600 pt-2">{{ $item['requests']['description'] }}</p>
                                         </div>
                                      </div>
                                   </td>
                                   <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">Rp{{ number_format($item['deal_price'], 0, ',', '.') }}</td>
                                   <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                                       @if($item['requests']['is_meet_seller'])
                                       <div class="mt-2">
                                           <span class="cursor-pointer hover:bg-green-200 duration-500 py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                               Ya
                                            </span>
                                        </div>
                                        @else
                                        <div class="mt-2">
                                            <span class="cursor-pointer hover:bg-red-200 duration-500 py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                                                Tidak
                                            </span>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ $item['requests']['due_at']->format('F j, h:i a') }}</td>
                                    <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ $item['requests']['meet_at']->format('F j, h:i a') }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                           </table>
                        </div>
                        <div class="flex justify-between items-center mt-6 pt-6 border-t">
                           <a href="{{ url()->previous() }}" class="flex items-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                              </svg>
                              <span class="text-md font-medium text-blue-500">Ajukan kontrak lagi</span> 
                           </a>
                           <div class="flex justify-center items-end"> <span class="text-sm font-medium text-gray-400 mr-1"></span> <span class="text-lg font-bold text-gray-800 ">Rp{{ number_format($totalContract, 0, ',', '.') }}</span> </div>
                        </div>
                     </div>
                     <div class="p-2">
                        <div class="p-5 bg-gray-800 rounded overflow-visible">
                           <span class="text-xl font-medium text-gray-100 block pb-4">Pembayaran</span>
                           <div class="py-4 border-t border-gray-600 flex flex-row justify-center">
                               <div>
                                   <span wire:click="bankTransfer" class="cursor-pointer mx-2 text-md font-medium text-blue-400 block">Bank Transfer</span>
                               </div>
                               <div>
                                   <span wire:click="qris" class="cursor-pointer mx-2 text-md font-medium text-blue-400 duration-500 block">QRIS</span>
                               </div>
                           </div>
                           <div class="py-4 border-t border-gray-600 flex justify-between">
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Kupon</span>
                               </div>
                               <div>
                                   <span class="cursor-pointer text-md font-medium text-blue-400 hover:text-blue-500 duration-500 block">Pilih Kupon</span>
                               </div>
                           </div>
                           <div class="py-4 border-t border-gray-600 flex justify-between">
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Metode Pembayaran</span>
                               </div>
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">{{ $paymentMethod }}</span>
                               </div>
                           </div>
                           <div class="py-4 border-gray-600 flex justify-between">
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Biaya Admin</span>
                               </div>
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Rp{{ number_format($adminfee, 0, ',', '.') }}</span>
                               </div>
                           </div>
                           <div class="py-4 border-gray-600 flex justify-between">
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Kontrak({{ count($contract) }})</span>
                               </div>
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Rp{{ number_format($totalContract, 0, ',', '.') }}</span>
                               </div>
                           </div>
                           <div class="py-4 border-gray-600 flex justify-between">
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Diskon</span>
                               </div>
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">-Rp{{ number_format($discount, 0, ',', '.') }}</span>
                               </div>
                           </div>
                            <div class="py-4 pt-8 border-t border-gray-600 flex justify-between">
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">SubTotal</span>
                               </div>
                               <div>
                                   <span class="text-md font-medium text-gray-400 block">Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                               </div>
                           </div>
                           <div class="py-4 pt-8 border-t border-gray-600 flex justify-between">
                               <div>
                                   <span class="text-lg font-medium text-gray-400 block">Total</span>
                               </div>
                               <div>
                                   <span class="text-lg font-medium text-gray-400 block">Rp{{ number_format($total, 0, ',', '.') }}</span>
                               </div>
                           </div>
                        </div>
                        <x-jet-button wire:click="setPayment" type="button" class="w-full justify-center my-2 mx-1 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:loading.attr="disabled">
                           {{ __('Bayar') }}
                        </x-jet-button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>