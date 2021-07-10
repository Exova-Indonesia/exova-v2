<div>
   <div class="h-screen w-full flex antialiased text-gray-200 overflow-hidden">
      <div class="flex-1 flex flex-col">
         <div class="flex-grow flex flex-row min-h-0">
            @livewire('contracts.components.sidebar', ['data' => $data])
            @if ($content == 'chats')
            @livewire('chats.components.chats-bar')
            @endif
            @if($content != 'chats')
            <div class="flex flex-col flex-auto border-l border-gray-300">
               
               <div class="chat-header border-gray-300 border-b px-6 py-4 flex flex-row flex-none justify-between items-center">
                  <div class="flex">
                     <div class="text-sm text-gray-900">
                        <p class="font-bold">{{ $data['requests']['title'] }}</p>
                        <p>Due Date : {{ $data['requests']['due_at']->diffForHumans() }}</p>
                     </div>
                  </div>
                  <div class="flex">
                     <a href="{{ url('/dashboard') }}" class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-3 ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full fill-current" viewBox="0 0 20 20" fill="currentColor">
                           <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                     </a>
                  </div>
               </div>
               @if(empty($data['payment_id']) || $data['status'] == App\Models\Contract::IS_WAITING_PAYMENT && !in_array($data['status'], [\App\Models\Contract::IS_FINISHED, \App\Models\Contract::IS_CANCELED]))
               <div class="chat-header bg-red-500 border-red-300 border-b px-6 py-4 flex flex-row flex-none justify-center items-center">
                  <div class="flex">
                     <div class="text-sm text-gray-100">
                        @if($data['customer_id'] == auth()->user()->id)
                        <p>{{ __('Ups, Kamu belum bayar kontrak, silahkan bayar terlebih dahulu') }}
                           <x-jet-button wire:click="pay" type="button" class="mx-1 bg-red-600 hover:bg-red-400 focus:border-red-600 active:bg-red-900">
                              {{ __('Disini') }}
                           </x-jet-button>
                        </p>
                        @else
                        <p>{{ __('Kontrak belum dibayarkan oleh klien') }}
                        </p>
                        @endif
                     </div>
                  </div>
               </div>
               @endif
               <div class="p-4 flex-1 overflow-y-scroll">
                  @if ($content == 'details')
                  @livewire('contracts.components.details', ['data' => $data])
                  @endif
                  @if ($content == 'edit')
                  @livewire('offers.dashboard', ['mute' => true, 'data' => $data])
                  <div class="text-right">
                     <x-jet-button type="button" class="my-2 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="updateOrderRequest" wire:loading.attr="disabled">
                        {{ __('Kirim') }}
                     </x-jet-button>
                  </div>
                  @endif
                  @if ($content == 'files')
                  @livewire('contracts.components.files', ['data' => $data])
                  @endif
                  @if ($content == 'feedback')
                  @livewire('contracts.components.feedback', ['data' => $data])
                  @endif
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
     <x-jet-dialog-modal wire:model="endContract">
      <x-slot name="title">
            <span class="text-gray-800">
                {{ __('Konfirmasi akhiri kontrak') }}
            </span>
      </x-slot>
      <x-slot name="content">
          <span class="text-gray-600">
            {{ __('Udah yakin mau berakhir sampe disini?') }}
          </span>
      </x-slot>
      <x-slot name="footer">
          <x-jet-secondary-button wire:click="$toggle('endContract')" wire:loading.attr="disabled">
              {{ __('Gajadi') }}
          </x-jet-secondary-button>
          <x-jet-button class="ml-2 bg-red-500 hover:bg-red-600"
                      wire:click="cancelContract"
                      wire:loading.attr="disabled">
              {{ __('Batalkan Kontrak') }}
          </x-jet-button>
          <x-jet-button class="ml-2"
                      wire:click="finishContract"
                      wire:loading.attr="disabled">
              {{ __('Selesaikan Kontrak') }}
          </x-jet-button>
      </x-slot>
  </x-jet-dialog-modal>
</div>