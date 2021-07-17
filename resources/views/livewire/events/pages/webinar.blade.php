<div>
   <x-app-layout>
      <x-slot name="header">
         @livewire('events.components.topnav')
      </x-slot>
      <div class="lg:m-16">
         <!-- Card is full width. Use in 12 col grid for best view. -->
        @foreach ($webinar as $item)
        <!-- Card code block start -->
        <div class="flex flex-col-reverse lg:flex-row w-full bg-white dark:bg-gray-800 shadow rounded">
           <div class="w-full lg:w-1/2">
              <div aria-label="card" class="pt-4 lg:pt-6 pb-4 lg:pb-6 pl-4 lg:pl-6 pr-4 lg:pr-6">
                 <div class="flex justify-between items-center lg:items-start flex-row-reverse lg:flex-col">
                    <h4 class="text-base text-indigo-700 dark:text-indigo-600 tracking-normal leading-4">{{ date('h:i a', strtotime($item['start_at'])) }}</h4>
                    <h4 class="lg:mt-3 text-gray-600 dark:text-gray-400 text-base font-normal">{{ date('l F j, Y', strtotime($item['start_at'])) }}</h4>
                 </div>
                 <a tabindex="0" class="focus:outline-none focus:underline focus:text-gray-500 hover:text-gray-500 cursor-pointer text-gray-800 dark:text-gray-100" >
                    <h2 class=" mt-4 mb-2 tracking-normal text-xl lg:text-2xl font-bold">{{ $item['title'] }}</h2>
                 </a>
                 <p class="mb-6 font-normal text-gray-600 dark:text-gray-400 text-sm tracking-normal w-11/12 lg:w-9/12">{{ $item['description'] }}</p>
                 <div class="flex lg:items-center items-start flex-col lg:flex-row">
                    {{-- 
                    <div class="flex items-center">
                       <div class="border-2 border-white dark:border-gray-700 shadow rounded-full w-6 h-6">
                          <img class="w-full h-full overflow-hidden object-cover rounded-full" src="https://dh-ui.s3.amazonaws.com/assets/webapp/layout/grid_cards/grid_card8.jpg" alt="avatar" />
                       </div>
                       <div class="-ml-2 border-2 border-white dark:border-gray-700 shadow rounded-full w-6 h-6">
                          <img class="w-full h-full overflow-hidden object-cover rounded-full" src="https://dh-ui.s3.amazonaws.com/assets/webapp/layout/grid_cards/grid_card9.jpg" alt="avatar" />
                       </div>
                       <a tabindex="0" class="cursor-pointer text-gray-600 focus:outline-none focus:underline focus:text-gray-400 hover:text-gray-400">
                          <p class=" dark:text-gray-400 text-xs font-normal ml-1">+12 Attendees</p>
                       </a>
                    </div>
                    --}}
                    <button class="text-gray-600 dark:text-gray-400 focus:outline-none hover:text-indigo-700 focus:text-indigo-700 mt-4 lg:mt-0 ml-0 flex items-end">
                       <span class="mr-1 ">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                             <path stroke="none" d="M0 0h24v24H0z" />
                             <circle cx="12" cy="11" r="3" />
                             <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
                          </svg>
                       </span>
                       <p class=" text-sm tracking-normal font-normal text-center">{{ $item['location'] }}</p>
                    </button>
                 </div>
              </div>
              <div class="px-5 lg:px-5 md:px-10 py-3 lg:py-4 flex flex-row items-center justify-between border-t border-gray-300">
                 <div class="flex items-center">
                    <div class="flex items-center">
                    @if ($item['status'] == 0)
                       <span class="px-3 py-1 text-sm rounded-full text-yellow-600  bg-yellow-200 ">
                       Waiting to Start
                       </span>
                    @elseif($item['status'] == 1)
                        <span class="px-3 py-1 text-sm rounded-full text-green-600  bg-green-200 ">
                        Started
                        </span>
                    @elseif($item['status'] == 2)
                        <span class="px-3 py-1 text-sm rounded-full text-red-600  bg-red-200 ">
                        Ended
                        </span>
                    @endif
                    </div>
                 </div>
              </div>
           </div>
           <div class="relative w-full h-64 lg:h-auto lg:w-1/2 rounded-t lg:rounded-t-none lg:rounded-r inline-block">
              <img class="w-full h-full absolute inset-0 object-cover rounded-t lg:rounded-r lg:rounded-t-none" src="https://tuk-cdn.s3.amazonaws.com/assets/components/grid_cards/gc_27.png" alt="banner" />
           </div>
        </div>
        <!-- Card code block end -->
        @endforeach
      </div>
   </x-app-layout>
</div>