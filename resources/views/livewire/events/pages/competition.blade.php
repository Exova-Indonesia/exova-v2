<div>
   {{-- <x-app-layout> --}}
      <x-slot name="header">
         @livewire('events.components.topnav')
      </x-slot>
      <div class="lg:m-16">
        @guest
        <div class="px-4 m-2 text-center py-3 leading-normal text-red-100 bg-red-600 rounded-lg" role="alert">
            <p>Kamu harus login terlebih dahulu sebelum submit karya! <a class="p-2 bg-red-700 text-white text-sm rounded-lg" href="{{ route('login') }}">Login</a> </p>
        </div>
        @else
        @if(auth()->user()->role_id == 1)
        <div class="px-4 m-2 text-center py-3 leading-normal text-blue-100 bg-blue-600 rounded-lg" role="alert">
            <p>Yuk lengkapi profile kamu dulu! <a class="p-2 bg-blue-700 text-white text-sm rounded-lg" href="{{ url('user/profile') }}">Lengkapi</a> </p>
        </div>
        @endif
        @endguest

        @if(session('status'))
        <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div>
                <p class="font-bold">{{ session('status') }}</p>
                <p class="text-sm">{{ session('messages') }}</p>
                </div>
            </div>
        </div>
        @endif
         <!-- Card is full width. Use in 12 col grid for best view. -->
         <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
             @foreach ($competition as $item)
             <!-- Card code block start -->
             <div class="my-2 flex flex-col-reverse lg:flex-row w-full bg-white dark:bg-gray-800 shadow rounded">
                <div class="w-full">
                   <div aria-label="card" class="pt-4 lg:pt-6 pb-4 lg:pb-6 pl-4 lg:pl-6 pr-4 lg:pr-6">
                      <div class="flex justify-between items-center lg:items-start flex-row-reverse lg:flex-col">
                         <h4 class="text-base text-indigo-700 dark:text-indigo-600 tracking-normal leading-4">Will End At</h4>
                         <h4 class="lg:mt-3 text-gray-600 dark:text-gray-400 text-base font-normal">{{ date('l F j, Y h:i a', strtotime($item['end_at'])) }}</h4>
                      </div>
                      <a tabindex="0" class="focus:outline-none focus:underline focus:text-gray-500 hover:text-gray-500 cursor-pointer text-gray-800 dark:text-gray-100" >
                         <h2 class=" mt-4 mb-2 tracking-normal text-xl lg:text-2xl font-bold">{{ $item['title'] }}</h2>
                      </a>
                      <p class="mb-2 font-normal text-gray-600 dark:text-gray-400 text-sm tracking-normal w-11/12 lg:w-9/12">{{ $item['description'] }}</p>
                      <a href="{{ $item['url_files'] }}" target="_blank" class="mb-6 font-normal text-blue-500 dark:text-gray-400 text-sm tracking-normal w-11/12 lg:w-9/12">{{ __('Unduh Penjelasan Lomba') }}</a>
                      <div class="flex lg:items-center items-start flex-col lg:flex-row my-3">
                        @if($item['status'] == 2)
                        <div class="flex items-center">
                            @forelse ($item['participant']->take(3) as $p)
                            <div class="border-2 border-white dark:border-gray-700 shadow rounded-full w-6 h-6">
                               <img class="w-full h-full overflow-hidden object-cover rounded-full" src="{{ $p['user']['profile_photo_url'] }}" alt="avatar" />
                            </div>
                            @empty
                            @endforelse
                           {{-- <a tabindex="0" class="cursor-pointer text-gray-600 focus:outline-none focus:underline focus:text-gray-400 hover:text-gray-400">
                              <p class=" dark:text-gray-400 text-xs font-normal ml-1">+{{ count($item['participant']) }} Peserta</p>
                           </a> --}}
                        </div>
                        @endif
                    </div>
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
                   <div class="px-5 lg:px-5 md:px-10 py-3 lg:py-4 flex flex-row items-center justify-between border-t border-gray-300">
                      <div class="flex items-center">
                         <div class="flex items-center">
                            @if ($item['status'] == 0)
                            <span class="px-3 py-1 text-sm rounded-full text-yellow-600  bg-yellow-200 ">
                            Waiting to Start
                            </span>
                            @elseif($item['status'] == 1)
                                <span class="px-3 py-1 text-sm rounded-full text-green-600  bg-green-200 ">
                                Ongoing
                                </span>
                            @elseif($item['status'] == 2)
                                <span class="px-3 py-1 text-sm rounded-full text-red-600  bg-red-200 ">
                                Ended
                                </span>
                            @endif
                         </div>
                      </div>
                    @if($item['status'] != 0 && auth()->check())
                        @if($item['participant']->where('user_id', auth()->user()->id)->first())
                        <div class="flex items-center">
                            <div class="flex items-center">
                               @if ($item['participant']->where('user_id', auth()->user()->id)->first()['file_id'] == 0)
                               <a class="px-3 py-1 cursor-pointer hover:bg-pink-300 duration-500 text-sm rounded-full text-pink-600 bg-pink-200">
                                   Karya terupload di {{ __('Link Google Drive') }}
                               </a>
                               @else
                               <a class="px-3 py-1 cursor-pointer hover:bg-pink-300 duration-500 text-sm rounded-full text-pink-600 bg-pink-200">
                                   Karya terupload : {{ $item['participant']->where('user_id', auth()->user()->id)->first()['file']['old_name'] }}
                               </a>
                               @endif
                            </div>
                        </div>
                        @else
                           @if($item['status'] == 1)
                           <div class="flex items-center">
                              <div class="flex items-center">
                                 <a href="{{ url('event/competition/' . $item['uuid']) }}" class="px-3 py-1 cursor-pointer hover:bg-blue-300 duration-500 text-sm rounded-full text-blue-600  bg-blue-200">
                                    Upload Karya
                                 </a>
                              </div>
                           </div>
                           @endif
                        @endif
                    @endif
                   </div>
                </div>
             </div>
             <!-- Card code block end -->
             @endforeach
         </div>
      </div>
   {{-- </x-app-layout> --}}
</div>