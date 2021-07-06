<div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
   <div class="flex items-center justify-between w-full">
      <div class="flex flex-col overflow-y-auto h-64 lg:flex-col w-full items-start rounded bg-white shadow p-4">
         <div class="text-xl text-gray-900">
            <span>
            Description
            </span>
         </div>
         <div class="text-gray-500 text-sm">
            <span>
            {{ $data['requests']['description'] }}
            </span>
            <div class="mt-4 text-xl text-gray-900">
               <span>
               Ketemu seller?
               </span>
            </div>
            @if($data['requests']['is_meet_seller'])
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
            <div class="mt-4 text-xl text-gray-900">
               <span>
               Deal at
               </span>
            </div>
            <div>
               {{ 'Rp' . number_format($data['deal_price'], 0, ',', '.') }}
            </div>
            <div class="mt-4 text-xl text-gray-900">
               <span>
               Location
               </span>
            </div>
            <div>
               {{ $data['requests']['locations']['address'] }}
            </div>
         </div>
      </div>
   </div>
   <div class="flex items-center justify-between w-full">
      <div class="flex flex-col h-64 lg:flex-col w-full items-start rounded bg-white shadow p-4">
         <div class="text-xl text-gray-900">
            <span>
            Jadwal Penting
            </span>
         </div>
         <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
            <table class="min-w-full bg-white">
               <thead>
                  <tr class="w-full h-16 border-gray-300 border-b py-8">
                     <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Keterangan</th>
                     <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Waktu</th>
                  </tr>
               </thead>
               <tbody>
                  <tr class="h-12 border-gray-300 border-b">
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        Due Date
                     </td>
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        {{ $data['requests']['due_at']->format('F j, Y h:i a') }}
                     </td>
                  </tr>
                  @if($data['requests']['meet_at'])
                  <tr class="h-12 border-gray-300 border-b">
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        Meet Date
                     </td>
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        {{ $data['requests']['meet_at']->format('F j, Y h:i a') }}
                     </td>
                  </tr>
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
   @livewire('components.card-file-contracts', ['data' => $data])
   <div class="flex items-center justify-between w-full">
      <div class="flex flex-col h-64 lg:flex-col w-full items-start rounded bg-white shadow p-4">
         <div class="flex w-full justify-between">
            <div class="text-xl text-gray-900">
               <span>
               Status
               </span>
            </div>
            @if($data['customer_id'] == auth()->user()->id && $data['status'] == 0 && !in_array($data['status'], [\App\Models\Contract::IS_FINISHED, \App\Models\Contract::IS_CANCELED]))
            <div>
               <span wire:click="pay" class="cursor-pointer hover:bg-green-200 duration-500 py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
               {{ __('Bayar') }}
               </span>
            </div>
            @endif
         </div>
         <div class="w-full overflow-x-scroll xl:overflow-x-hidden">
            <table class="min-w-full bg-white">
               <thead>
                  <tr class="w-full h-16 border-gray-300 border-b py-8">
                     <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Keterangan</th>
                     <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal px-6 text-center text-sm tracking-normal leading-4">Status</th>
                  </tr>
               </thead>
               <tbody>
                  <tr class="h-12 border-gray-300 border-b">
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        Contract
                     </td>
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        @switch($data['status'])
                            @case(0)
                                <span class="py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
                                    Waiting Payment
                                </span>
                                @break
                            @case(1)
                                <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                    Contract Started
                                </span>
                                @break
                            @case(2)
                                <span class="py-2 px-4 text-xs leading-3 text-blue-700 rounded-full bg-blue-100">
                                    Request Approvement
                                </span>
                                @break
                            @case(3)
                                <span class="py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
                                    Project Returned
                                </span>
                                @break
                            @case(4)
                                <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                    Project Approved
                                </span>
                                @break
                            @case(5)
                                <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                                    Contract End
                                </span>
                                @break
                            @case(6)
                                <span class="py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                                    Contract Canceled
                                </span>
                                @break
                            @default
                                
                        @endswitch
                     </td>
                  </tr>
                  <tr class="h-12 border-gray-300 border-b">
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        Pembayaran
                     </td>
                     <td class="px-6 text-center whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                        @if($data['status'] == 0 && empty($data['payment_id']))
                        <span class="py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                            Payment haven't created yet
                        </span>
                        @elseif($data['payment']['status'] == \App\Models\Payment::IS_PENDING)
                        <span class="py-2 px-4 text-xs leading-3 text-yellow-700 rounded-full bg-yellow-100">
                            Payment pending
                        </span>
                        @elseif($data['payment']['status'] == \App\Models\Payment::IS_SUCCESS)
                        <span class="py-2 px-4 text-xs leading-3 text-green-700 rounded-full bg-green-100">
                            Payment success
                        </span>
                        @else 
                        <span class="py-2 px-4 text-xs leading-3 text-red-700 rounded-full bg-red-100">
                            Payment failed
                        </span>
                        @endif
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>