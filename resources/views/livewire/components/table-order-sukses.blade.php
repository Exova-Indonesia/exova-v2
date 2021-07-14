<div>
   <div>
      <div class="w-full">
         <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
            <div class="sm:flex items-center justify-between">
               <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">Kontrak Selesai</p>
            </div>
         </div>
         <div class="bg-white shadow px-4 md:px-10 pt-4 md:pt-7 pb-5 overflow-y-auto">
            @if(count($contract) > 0)
            <table class="w-full whitespace-nowrap">
               <thead>
                  <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800">
                     <th class="font-normal text-left pl-4">Project</th>
                     <th class="font-normal text-left pl-12">Last Submited</th>
                     <th class="font-normal text-left pl-20">Feedback</th>
                     <th class="font-normal text-left pl-20">Dibayar</th>
                     <th class="font-normal text-left pl-20">Finish At</th>
                     <th class="font-normal text-left pl-20">Client</th>
                  </tr>
               </thead>
               <tbody class="w-full">
                @foreach ($contract as $item)
                <tr wire:click="openProject(`{{ $item['uuid'] }}`)" tabindex="0" class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">
                   <td class="pl-4 cursor-pointer">
                      <div class="flex items-center">
                         <div>
                            <p class="font-medium">{{ $item['requests']['title'] }}</p>
                            <p class="text-xs leading-3 text-gray-600 pt-2">{{ $item['requests']['description'] }}</p>
                         </div>
                      </div>
                   </td>
                   <td class="pl-12 cursor-pointer text-center" wire:click="downloadFileContract('{{ $item['files']->first()['file'] }}')">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                      </svg>
                   </td>
                    <div wire:loading wire:target="downloadFileContract('{{ $item['files']->first()['file'] }}')">
                    <!--code for notification starts-->
                        <div role="alert" class="z-20 h-20 xl:w-4/12 mx-auto sm:mx-0 sm:w-6/12 md:w-6/12 justify-between w-10/12 bg-white dark:bg-gray-800 shadow-lg rounded flex fixed left-0 sm:left-auto right-0 sm:top-0 sm:mr-6 mt-16 sm:mt-6 mb-6 sm:mb-0 transition duration-150 ease-in-out" id="notification">
                            <div class="px-2 sm:px-4 border-r border-gray-300 dark:border-gray-700 flex items-center justify-center">
                                <div class="h-12 w-12 sm:h-10 sm:w-10 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="animate-bounce text-gray-600 h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center xl:-ml-6 pl-4 xl:pl-1 w-3/5">
                                <p tabindex="0" class="focus:outline-none text-sm text-gray-800 dark:text-gray-100 font-semibold">{{ explode(',', $trollMsg)[0] }}</p>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 dark:text-gray-400 font-normal">{{ explode(',', $trollMsg)[1] }}</p>
                            </div>
                            <div class="flex flex-col justify-center border-l items-center border-gray-300 dark:border-gray-700 w-1/3 sm:w-1/6">
                                <div class="pt-2 pb-2 border-b border-gray-300 dark:border-gray-700 w-full flex justify-center">
                                    <span tabindex="0" class="focus:outline-none focus:text-blue-800 hover:underline text-sm text-blue-700 font-bold cursor-pointer">Y udh si</span>
                                </div>
                                <div class="pt-2 pb-2 flex justify-center w-full cursor-pointer">
                                    <span tabindex="0" class="focus:outline-none hover:underline focus:text-gray-400 text-sm text-gray-600 dark:text-gray-400 cursor-pointer">Gamau</span>
                                </div>
                            </div>
                        </div>
                    <!--code for notification ends-->
                    </div>
                   <td class="pl-20">
                      <p class="font-medium">{{ $item['feedback']['comment'] }}</p>
                   </td>
                   <td class="pl-20">
                      <p class="font-medium">{{ 'Rp' . number_format($item['earn'], 0, ',', '.') }}</p>
                   </td>
                   <td class="pl-20">
                      <p class="font-medium">
                        {{ $item['end_at']->format('F j, Y h:i a') }}
                      </p>
                   </td>
                   <td class="pl-20">
                      <div class="w-10 h-10">
                         <img class="w-full h-full rounded-full" src="{{ $item['customer']['profile_photo_url'] }}" alt="{{ $item['customer']['name'] }}" />
                      </div>
                   </td>
                </tr>
                @endforeach
               </tbody>
            </table>
        @else
        <div class="flex flex-col">
            <div class="m-auto">
               <img src="{{ Storage::disk('s3')->url('icons/emtproduct.svg') }}" alt="">
            </div>
            <div>
               <p class="py-2 text-center">Tidak ada data</p>
            </div>
        </div>
        @endif
         </div>
      </div>
   </div>
</div>