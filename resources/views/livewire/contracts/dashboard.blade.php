<div>
   <div class="h-screen w-full flex antialiased text-gray-200 overflow-hidden">
      <div class="flex-1 flex flex-col">
         <div class="flex-grow flex flex-row min-h-0">
            @livewire('contracts.components.sidebar')
            
            <div class="flex flex-col flex-auto border-l border-gray-300">
               <div class="chat-header border-gray-300 border-b px-6 py-4 flex flex-row flex-none justify-between items-center">
                  <div class="flex">
                     <div class="w-12 h-12 mr-4 relative flex flex-shrink-0">
                        <img class="shadow-md rounded-full w-full h-full object-cover"
                           src="https://randomuser.me/api/portraits/women/33.jpg"
                           alt=""
                           />
                     </div>
                     <div class="text-sm text-gray-900">
                        <p class="font-bold">Wedding Photography</p>
                        <p>Due Date : 2 Days Later</p>
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
               <div class="p-4 flex-1 overflow-y-scroll">
                @if ($content == 'details')
                    @livewire('contracts.components.details')
                @endif
                @if ($content == 'edit')
                    @livewire('offers.dashboard')
                    <div class="text-right">
                        <x-jet-button type="button" class="my-2 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="negoAndnext" wire:loading.attr="disabled">
                            {{ __('Kirim') }}
                        </x-jet-button>
                    </div>
                @endif
                @if ($content == 'chats')
                    @livewire('chats.components.chats-bar')
                @endif
                @if ($content == 'files')
                    @livewire('contracts.components.files')
                @endif
                @if ($content == 'feedback')
                    @livewire('contracts.components.feedback')
                @endif
               </div>
            </div>

         </div>
      </div>
   </div>
</div>