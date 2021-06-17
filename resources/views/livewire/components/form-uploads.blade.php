<div>
   <!-- modal div -->
   <div class="mt-6">
      <!-- Dialog (full screen) -->
      <div class="absolute inset-0 bg-gray-500 opacity-75 z-30"></div>
      <div class="absolute right-0 top-0 left-0 z-30 flex items-center justify-center w-full h-full">
         <!-- A basic modal dialog with title, body and one button to close -->
         <div class="h-auto lg:w-3/5 w-full p-4 bg-white rounded shadow-xl m-auto md:p-6 lg:p-8">
            <div class="mt-3 sm:mt-0">
               <div>
                  <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $namaproject }}</h3>
                  <div class="w-full mt-8 mx-auto">
                     <div class="bg-gray-200 h-1 flex items-center justify-between">
                        <div class="w-1/3 bg-indigo-700 h-1 flex items-center">
                           <div class="bg-indigo-700 h-6 w-6 rounded-full shadow flex items-center justify-center">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" />
                                 <path d="M5 12l5 5l10 -10" />
                              </svg>
                           </div>
                        </div>
                        <div class="w-1/3 flex justify-between bg-indigo-700 h-1 items-center relative">
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
                                 <p tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-bold">Step 3: Analyzing</p>
                              </div>
                           </div>
                           <div class="bg-indigo-700 h-6 w-6 rounded-full shadow flex items-center justify-center -ml-2">
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" />
                                 <path d="M5 12l5 5l10 -10" />
                              </svg>
                           </div>
                           <div class="bg-white h-6 w-6 rounded-full shadow flex items-center justify-center -mr-3 relative">
                              <div class="h-3 w-3 bg-indigo-700 rounded-full"></div>
                           </div>
                        </div>
                        <div class="w-1/3 flex justify-end">
                           <div class="bg-white h-6 w-6 rounded-full shadow"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="mt-16">
                  <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
                     <div class="mt-2 flex flex-col w-full lg:col-span-2">
                        <label  class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Nama Project</label>
                        <input aria-label="enter username" type="text" name="namaproject" wire:model="namaproject" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 text-gray-800 bg-transparent dark:text-gray-100" required />
                     </div>
                     <div class="mt-2 flex flex-col w-full">
                        <label  class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Style</label>
                        <select aria-label="select category" type="text" name="style" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 text-gray-800 bg-transparent dark:text-gray-100" required>
                           <option value="1">Balinese</option>
                        </select>
                     </div>
                  </div>
                  <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
                     <div class="mt-2 flex flex-col w-full lg:col-span-2">
                        <label for="about" class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">About</label>
                        <textarea aria-label="enter information about yourself" id="about" name="about" class="border border-gray-300 dark:border-gray-700 pl-3 py-2 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 bg-transparent resize-none text-gray-800 dark:text-gray-100" placeholder="Let the world know who you are" rows="5" required></textarea>
                        <p class="w-full text-right text-xs text-gray-500 pt-1">Character Limit: 200</p>
                     </div>
                     <div class="mt-2 flex flex-col">
                        <div class="flex flex-col w-full">
                           <label  class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Kategori</label>
                           <select aria-label="select subcategory" type="text" name="kategori" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 text-gray-800 bg-transparent dark:text-gray-100" required>
                              <option value="1">Photography</option>
                           </select>
                        </div>
                        <div class="flex flex-col w-full">
                           <label  class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Sub Kategori</label>
                           <select aria-label="select subcategory" type="text" name="subkategori" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 text-gray-800 bg-transparent dark:text-gray-100" required>
                              <option value="1">Photography</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="mt-2 flex flex-col w-full lg:col-span-2">
                     <label  class="pb-2 text-sm font-bold text-gray-800 dark:text-gray-100">Tags</label>
                     <input aria-label="enter username" type="text" name="tags" class="border border-gray-300 dark:border-gray-700 pl-3 py-3 shadow-sm rounded text-sm focus:outline-none focus:border-indigo-700 text-gray-800 bg-transparent dark:text-gray-100" required />
                  </div>
               </div>
            </div>
            <!-- One big close button.  --->
            <div class="mt-5 sm:mt-6">
               <span class="flex w-full justify-between rounded-md shadow-sm">
                  <x-jet-button class="bg-pink-500 hover:bg-pink-600 focus:border-pink-600 active:bg-pink-900" wire:click="closeModal" wire:loading.attr="disabled">
                     {{ __('Batal') }}
                  </x-jet-button>
                  <x-jet-button class="bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="closeModal" wire:loading.attr="disabled">
                     {{ __('Lanjutkan') }}
                  </x-jet-button>
               </span>
            </div>
         </div>
      </div>
   </div>
</div>