<div>
   <!-- modal div -->
   <div class="mt-6">
      <!-- Dialog (full screen) -->
      <div class="absolute inset-0 bg-gray-500 opacity-75 z-30"></div>
      <div class="absolute right-0 top-0 left-0 z-30 flex items-center justify-center w-full h-full lg:overflow-y-hidden overflow-y-scroll">
         <!-- A basic modal dialog with title, body and one button to close -->
         <div class="h-auto lg:w-3/5 w-full p-4 bg-white rounded shadow-xl lg:m-auto mx-4 md:p-6 lg:p-8">
            <div class="mt-3 sm:mt-0">
               <div>
                  <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $namaproject }}</h3>
                  <div class="w-full mt-8 mx-auto">
                     
                     <div class="bg-gray-200 h-1 flex items-center justify-between">
                        @foreach ($timeline as $item)
                        <div class="flex justify-between bg-indigo-700 h-1 items-center relative">
                           @if($page == $item['page'])
                           {{-- Details --}}
                           <div class="absolute right-0 -mr-2">
                              <div class="relative bg-white shadow-lg px-2 py-1 rounded mt-16 -mr-12">
                                 <svg class="absolute top-0 -mt-1 w-full right-0 left-0" width="16px" height="8px" viewBox="0 0 16 8" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <g id="Progress-Bars" transform="translate(-322.000000, -198.000000)" fill="#FFFFFF">
                                          <g id="Group-4" transform="translate(310.000000, 198.000000)">
                                             <polygon id="Triangle" points="20 0 28 8 12 8"></polygon>
                                          </g>
                                       </g>
                                    </g>
                                 </svg>
                                 <p tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-bold">{{ "Step " . $item['page'] .  " : " . $item['title'] }}</p>
                              </div>
                           </div>
                           {{-- Details End --}}
                           <div class="bg-white h-6 w-6 rounded-full shadow flex items-center justify-center -mr-3 relative">
                              <div class="h-3 w-3 bg-indigo-700 rounded-full"></div>
                           </div>
                           @endif
                           @if($page > $item['page'])
                           <div class="bg-indigo-700 h-6 w-6 rounded-full shadow flex items-center justify-center -ml-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" />
                                 <path d="M5 12l5 5l10 -10" />
                              </svg>
                           </div>
                           @endif
                        </div>
                        @if($page < $item['page'])
                        <div class="flex justify-end">
                           <div class="bg-white h-6 w-6 rounded-full shadow"></div>
                        </div>
                        @endif
                        @endforeach
                     </div> 
                     
                  </div>
               </div>
               <div class="mt-16">
                  @if ($page == 1)
                     @livewire('uploads.components.details')
                  @elseif($page == 2)
                     @livewire('uploads.components.gallery')
                  @elseif($page == 3)
                     @livewire('uploads.components.pricing')
                  @elseif($page == 4)
                     @livewire('uploads.components.publish')
                  @endif
               </div>
            </div>
            <!-- One big close button.  --->
            <div class="mt-5 sm:mt-6">
               <span class="flex w-full justify-between rounded-md shadow-sm">
                  <x-jet-button class="bg-pink-500 hover:bg-pink-600 focus:border-pink-600 active:bg-pink-900" wire:click="closeModal" wire:loading.attr="disabled">
                     {{ __('Batal') }}
                  </x-jet-button>
                  <div class="flex justify-between">
                  @if ($page > 1)
                     <x-jet-button type="button" class="mx-1 bg-indigo-500 hover:bg-indigo-600 focus:border-indigo-600 active:bg-indigo-900" wire:click="previousPage" wire:loading.attr="disabled">
                        {{ __('Kembali') }}
                     </x-jet-button>
                  @endif
                  @if($page == 4)
                     <x-jet-button type="button" class="mx-1 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="publish" wire:loading.attr="disabled">
                        {{ __('Publikasikan') }}
                     </x-jet-button>
                  @else
                     <x-jet-button type="button" class="mx-1 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="continue" wire:loading.attr="disabled">
                        {{ __('Lanjutkan') }}
                     </x-jet-button>
                  @endif
                  </div>
               </span>
            </div>
         </div>
      </div>
   </div>
</div>
