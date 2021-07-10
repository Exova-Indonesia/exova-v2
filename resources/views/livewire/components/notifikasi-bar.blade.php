<div>
   <div class="items-center justify-center w-full my-2">
      <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:mb-0 mb-7 bg-white lg:p-4 p-2 shadow rounded-lg">
         <a href="{{ $data->data['action_url'] }}" class="flex flex-col lg:flex-row items-center border-gray-200 pb-2">
            <div class="flex items-start justify-between w-full">
               <div class="pl-3 w-4/5">
                  <p tabindex="0" class="focus:outline-none text-md pb-4 pt-2 font-medium leading-5 text-gray-800">{{ $data->data['title'] }}</p>
                  <div>
                     <div tabindex="0" class="focus:outline-none flex justify-start">
                        <div class="py-2 px-4 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100">{{ $data->created_at->diffForHumans() }}</div>
                     </div>
                  </div>
               </div>
               {{-- @if($data->unreadNotifications)
               <div role="img" aria-label="bookmark">
                  <div class="flex h-3 w-3">
                     <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-blue-400 opacity-75"></span>
                     <span class="relative inline-flex rounded-full h-3 w-3 bg-blue-500"></span>
                  </div>
               </div>
               @endif --}}
            </div>
         </a>
      </div>
   </div>
</div>