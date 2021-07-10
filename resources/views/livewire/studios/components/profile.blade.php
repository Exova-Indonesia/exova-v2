
<div class="w-full lg:w-2/5 border-r">
   <div class="px-12 flex flex-col items-center py-10">
      <div class="w-24 h-24 mb-3 p-2 rounded-full bg-blue-200 dark:bg-gray-700 flex items-center justify-center">
         <img role="img" class="w-full h-full overflow-hidden object-cover rounded-full" src="{{ $user['profile_photo_url'] }}" alt="avatar" />
      </div>
      <a tabindex="0" class="focus:outline-none focus:opacity-75 hover:opacity-75 text-gray-800 dark:text-gray-100 cursor-pointer focus:underline">
         <h2 class=" text-xl tracking-normal font-medium mb-1">{{ $user['name'] }}</h2>
      </a>
      <a tabindex="0" class="cursor-pointer hover:text-indigo-700 focus:underline focus:outline-none focus:text-indigo-700 flex text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-3 text-center">
         <span class="cursor-pointer mr-1 text-gray-600 dark:text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" />
               <circle cx="12" cy="11" r="3" />
               <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 0 1 -2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0z" />
            </svg>
         </span>
         {{ $user['locations'] }}
      </a>
      <p class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">{{ $user['description'] }}</p>
      <div class="flex items-start">
         <div class="">
            <h2 class="text-gray-600 dark:text-gray-100 text-2xl leading-6 mb-2 text-center">{{ $user['xpoints']->sum('value') }}</h2>
            <a  tabindex="0" class="focus:outline-none focus:underline focus:text-gray-400 text-gray-800 hover:text-gray-400 cursor-pointer">
               <p class=" dark:text-gray-100 text-sm leading-5">Points</p>
            </a>
         </div>
         <div class="mx-6 lg:mx-3 xl:mx-6 px-8 lg:px-4 xl:px-8">
            <h2 class="text-gray-600 dark:text-gray-100 text-2xl leading-6 mb-2 text-center">{{ count($user['contracts']) }}</h2>
            <a tabindex="0" class="focus:outline-none focus:underline focus:text-gray-400 text-gray-800 hover:text-gray-400 cursor-pointer">
               <p class=" dark:text-gray-100 text-sm leading-5">Projects</p>
            </a>
         </div>
         <div class="">
            <h2 class="text-gray-600 dark:text-gray-100 text-2xl leading-6 mb-2 text-center">{{ count($user['contractSuccess']) }}</h2>
            <a tabindex="0" class="focus:outline-none focus:underline focus:text-gray-400 text-gray-800 hover:text-gray-400 cursor-pointer">
               <p class=" dark:text-gray-100 text-sm leading-5">Success</p>
            </a>
         </div>
      </div>
        <div class="w-full flex-col md:flex-row justify-center flex pt-12">
          <div class="flex items-center justify-center xl:justify-start mt-1 md:mt-0 mb-5 md:mb-0">
            @if($user['id'] == auth()->user()->id)
            <a href="{{ url('user/studio/' . $user['username']) }}" tabindex="0" class="focus:outline-none hover:bg-blue-200 transistion ease-in-out duration-200 hover:text-blue-900 cursor-pointer mx-2 rounded-full bg-blue-100 text-blue-700 text-sm px-6 py-2 flex justify-center items-center">Kelola Studio</a>
            <div tabindex="0" class="focus:outline-none hover:bg-green-200 transistion ease-in-out duration-200 hover:text-green-900 cursor-pointer mx-2 rounded-full bg-green-100 text-green-700 text-sm px-6 py-2 flex justify-center items-center">Promosikan</div>
            @else
            <div tabindex="0" class="focus:outline-none hover:bg-blue-200 transistion ease-in-out duration-200 hover:text-blue-900 cursor-pointer mx-2 rounded-full bg-blue-100 text-blue-700 text-sm px-6 py-2 flex justify-center items-center">Tawarkan Pekerjaan</div>
            @endif
          </div>
      </div>
   </div>
   <div class="px-12 border-t border-b lg:border-t-0 lg:border-b-0 border-gray-300 flex flex-col items-center py-4">
      <div class="mb-2 w-24 h-24 rounded-full bg-gray-100 flex items-center justify-center cursor-pointer text-indigo-700">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" />
            <polyline points="12 4 4 8 12 12 20 8 12 4" />
            <polyline points="4 12 12 16 20 12" />
            <polyline points="4 16 12 20 20 16" />
         </svg>
      </div>
      <a tabindex="0" class="cursor-pointer  focus:opacity-75 focus:underline hover:opacity-75  focus:outline-none text-gray-800 dark:text-gray-100 text-xl tracking-normal text-center font-medium mb-1">{{ $user['roles']['name'] }}</a>
      {{-- <p class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-3 text-center">{{ $user['roles']['name'] }}</p> --}}
      {{-- <div class="flex items-start">
         <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded text-xs leading-3 py-2 px-3">Interface</a>
         <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded mx-2 text-xs leading-3 py-2 px-3">Interface</a>
         <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded text-xs leading-3 py-2 px-3">Interface</a>
      </div>
      <div class="mt-2 flex items-start">
         <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded text-xs leading-3 py-2 px-3">Interface</a>
         <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded mx-2 text-xs leading-3 py-2 px-3">Interface</a>
         <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded text-xs leading-3 py-2 px-3">Interface</a>
      </div> --}}
   </div>
   <div class="flex-col flex justify-center items-center px-12 py-8">
      <h2 class="text-center text-2xl text-gray-800 dark:text-gray-100 font-medium tracking-normal">{{ 'Rp' . number_format($user['revenue']->sum('amount'), 0, ',', '.') }}</h2>
      <h2 class="text-center text-sm text-gray-600 dark:text-gray-100 font-normal mt-2 mb-4 tracking-normal">Total Dibayarkan</h2>
   </div>
</div>

