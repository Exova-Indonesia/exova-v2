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
                     <a href="#" class="block rounded-full hover:bg-gray-700 bg-gray-800 w-10 h-10 p-3 ml-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full fill-current" viewBox="0 0 20 20" fill="currentColor">
                           <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                     </a>
                  </div>
               </div>
               @if($data['status'] == App\Models\Contract::IS_WAITING_PAYMENT)
               <div class="chat-header bg-red-500 border-red-300 border-b px-6 py-4 flex flex-row flex-none justify-center items-center">
                  <div class="flex">
                     <div class="text-sm text-gray-100">
                        @if($data['customer_id'] == auth()->user()->id)
                        <p>{{ __('Ups, Kamu belum bayar kontrak, silahkan bayar terlebih dahulu') }}
                           <x-jet-button type="button" class="mx-1 bg-red-600 hover:bg-red-400 focus:border-red-600 active:bg-red-900">
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
                  @livewire('offers.dashboard')
                  <div class="text-right">
                     <x-jet-button type="button" class="my-2 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="negoAndnext" wire:loading.attr="disabled">
                        {{ __('Kirim') }}
                     </x-jet-button>
                  </div>
                  @endif
                  @if ($content == 'files')
                  @livewire('contracts.components.files', ['data' => $data])
                  @endif
                  @if ($content == 'feedback')
                  @livewire('contracts.components.feedback')
                  @endif
               </div>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>