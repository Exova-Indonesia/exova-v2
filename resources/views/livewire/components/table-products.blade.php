<div>
   <div class="mx-auto container bg-white dark:bg-gray-800 dark:bg-gray-800 shadow rounded">
      <div class="flex flex-col lg:flex-row p-4 lg:p-8 justify-between items-start lg:items-stretch w-full">
         <div class="w-full lg:w-1/3 flex flex-col lg:flex-row items-start lg:items-center">
            @if(count($selectedProducts) > 0)
            <div class="flex items-center">
               <x-delete-button class="bg-red-500 hover:bg-red-600 focus:border-red-600 active:bg-red-900" wire:click="deleteProduct">
                  {{ __('Delete') }}
               </x-delete-button>
            </div>
            @endif
         </div>
         <div class="w-full lg:w-2/3 flex flex-col lg:flex-row items-start lg:items-center justify-end">
            {{-- <div class="flex items-center lg:border-l lg:border-r border-gray-300 py-3 lg:py-0 lg:px-6">
               <p class="text-base text-gray-600 dark:text-gray-400" id="page-view">Viewing 1 - 20 of 60</p>
               <button class="text-gray-600 dark:text-gray-400 ml-2 border-transparent border cursor-pointer rounded focus:outline-none focus:ring-2 focus:ring-gray-500 " onclick="pageView(false)" aria-label="Goto previous page " role="button">
                  <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" />
                     <polyline points="15 6 9 12 15 18" />
                  </svg>
               </button>
               <button class="text-gray-600 dark:text-gray-400 border-transparent border rounded focus:outline-none focus:ring-2 focus:ring-gray-500 cursor-pointer" aria-label="goto next page" role="button" onclick="pageView(true)">
                  <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" />
                     <polyline points="9 6 15 12 9 18" />
                  </svg>
               </button>
            </div> --}}
            <div class="lg:ml-6 flex items-center">
               <x-upload-button wire:click="openModal" class="ml-2 bg-green-500 hover:bg-green-600 focus:border-green-600 active:bg-green-900" >
                  {{ __('Upload') }}
               </x-upload-button>
            </div>
         </div>
      </div>
      <div class="w-full overflow-x-scroll overflow-y-scroll h-96 xl:overflow-x-hidden">
         <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
               <tr class="w-full h-16 border-gray-300 border-b py-8">
                  <th class="pl-8 text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">
                     <input wire:model="selectAll" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" />
                  </th>
                  <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Project Name</th>
                  <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Style</th>
                  <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Price</th>
                  <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Visitors</th>
                  <th role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-6 text-left text-sm tracking-normal leading-4">Status</th>
                  <td role="columnheader" class="text-gray-600 dark:text-gray-400 font-normal pr-8 text-left text-sm tracking-normal leading-4">More</td>
               </tr>
            </thead>
            <tbody>
                @forelse ($product as $key => $item)
                <tr class="h-24 border-gray-300 border-b">
                   <td class="pl-8 pr-6 text-left whitespace-no-wrap text-sm text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                      <input wire:model="selectedProducts" value="{{ $item['id'] }}" type="checkbox" class="cursor-pointer relative w-5 h-5 border rounded border-gray-400 bg-white dark:bg-gray-800 focus:outline-none focus:outline-none focus:ring-2  focus:ring-gray-400" />
                   </td>
                   <td class="pr-4 cursor-pointer">
                      <div class="flex items-center">
                         <div class="w-10 h-10">
                            <img class="w-full h-full object-cover" src="{{ $item['cover']['getSmall']['path'] }}" alt="Picture" />
                         </div>
                         <div class="pl-4">
                            <p class="font-medium">{{ $item['title'] }}</p>
                            <p class="text-xs leading-3 text-gray-600 pt-2">{{ $item['description'] }}</p>
                         </div>
                      </div>
                   </td>
                   <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                      {{ $item['style']['name'] }}
                   </td>
                   <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">{{ 'Rp' . number_format($item['price'], 0, ',', '.') }}</td>
                   <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">02.03.20</td>
                   <td class="text-sm pr-6 whitespace-no-wrap text-gray-800 dark:text-gray-100 tracking-normal leading-4">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if ($item['is_active']) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                        @if ($item['is_active'])
                           Active
                        @else
                           Draf
                        @endif
                      </span>
                   </td>
                   <td class="pr-8 relative">
                      <button wire:click="dropDown({{ $item['id'] }})" aria-label="dropdown" role="button" class="dropbtn text-gray-500 rounded cursor-pointer border border-transparent  focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400">
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dots-vertical dropbtn" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="12" cy="19" r="1" />
                            <circle cx="12" cy="5" r="1" />
                         </svg>
                      </button>
                      @if($dropdown == $item['id'])
                      <div class="dropdown-content mt-1 absolute left-0 -ml-12 shadow-md z-10 w-32">
                         <ul class="bg-white dark:bg-gray-800 shadow rounded py-1">
                            <li wire:click="editProduct('{{ $item['uuid'] }}')" class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Edit</li>
                            <li wire:click="deleteProduct('{{ $item['uuid'] }}')" class="cursor-pointer text-gray-600 dark:text-gray-400 text-sm leading-3 tracking-normal py-3 hover:bg-indigo-700 hover:text-white px-3 font-normal">Delete</li>
                         </ul>
                      </div>
                      @endif
                   </td>
                </tr>
                @empty
                    
                @endforelse

            </tbody>
         </table>
      </div>
   </div>
</div>