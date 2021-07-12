<div>
   <x-app-layout>
      <x-slot name="header">
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
                  {{ __('Freelancer') }}
               </h2>
            </div>
         </div>
      </x-slot>
      <div class="overflow-x-hidden">
         <div class="p-10 text-center lg:w-3/5 w-full m-auto">
            <x-jet-input type="text" class="mt-1 block w-full"
            placeholder="{{ __('Cari Freelancer') }}"
            x-ref="search"
            wire:model="search" />
      </div>
      <div>
         <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 grid lg:grid-cols-2 grid-cols-1 gap-2">
            @foreach ($data as $item)
            <div class="items-center justify-center w-full">
               <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:mb-0 mb-7 bg-white p-6 shadow rounded">
                  <div class="flex flex-col lg:flex-row items-center border-gray-200 pb-2">
                     <img src="{{ $item['profile_photo_url'] }}" alt="avatar" class="object-cover w-full h-36 lg:w-24 lg:h-24 lg:rounded-full rounded-lg" />
                     <div class="flex items-start justify-between w-full">
                        <a href="{{ url('user/' . $item['username']) }}" class="pl-3 w-full">
                           <p tabindex="0" class="focus:outline-none text-xl pt-2 font-medium leading-5 text-gray-800">{{ Str::limit($item['name'], 20) }}</p>
                           <p tabindex="0" class="focus:outline-none text-sm leading-5 py-1 text-gray-600">{{ Str::limit($item['description'], 40) }}</p>
                           <div class="pt-2 ">
                              <div tabindex="0" class="focus:outline-none flex justify-start">
                                 <div class="py-1 mx-1 px-4 text-xs leading-3 text-grey-700 rounded-full bg-pink-100 justify-between flex">
                                    <div class="p-1 text-pink-500">
                                       <span>
                                       {{ count($item['contracts']) }} Project
                                       </span>
                                    </div>
                                 </div>
                                 <div class="py-1 mx-1 px-4 text-xs leading-3 text-grey-700 rounded-full bg-purple-100 justify-between flex">
                                    <div class="p-1 text-purple-500">
                                       <span>
                                       {{ $item['roles']['name'] }}
                                       </span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        {{-- <div role="img" aria-label="bookmark">
                           <div class="py-2 px-4 ml-3 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100 hover:bg-indigo-200 cursor-pointer duration-500">Kontrak</div>
                        </div> --}}
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            
         </div>
      </div>
   </x-app-layout>
</div>