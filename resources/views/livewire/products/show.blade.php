<div>
   {{-- <x-app-layout> --}}
      <x-slot name="navbar">
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
                  {{ __('Jasa') }}
               </h2>
            </div>
         </div>
      </x-slot>
      @if($share && !auth()->check())
      <div class="cursor-pointer bg-red-600 duration-500 px-6 py-2 flex flex-row flex-none justify-center items-center shadow">
         <p class="text-center text-white my-4">
            Kamu sedang berada dalam mode berbagi, <a class="bg-blue-600 border-0 py-2 px-6 focus:outline-none rounded" href="{{ route('login') }}">Login</a> untuk menikmati lebih banyak fitur
         </p>
      </div>
      @endif
      <section class="body-font overflow-hidden">
         <div class="px-5 py-24">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
               <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-96 h-64 object-cover object-center rounded" src="{{ $cover ?? $product['cover']['getLarge']['path'] }}">
               <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                  <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product['subcategory']['name'] }}</h2>
                  <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $product['title'] }}</h1>
                  <div class="flex mb-4">
                     <span class="flex items-center">
                        <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-yellow-500" viewBox="0 0 24 24">
                           <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                        </svg>
                        <span class="text-gray-600 ml-3">{{ $reviews }} Feedbacks</span>
                     </span>
                     <div class="ml-4">
                         <button wire:click="setToWishlist" class="p-2 bg-blue-600 rounded-full focus:outline-none" type="button" wire:click="addToWish({{ $product['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                               <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                         </button>
                         <button wire:click="setToCart" class="p-2 bg-blue-600 rounded-full focus:outline-none" type="button" wire:click="addToCart({{ $product['id'] }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                               <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                         </button>  
                     </div>
                  </div>
                  <p class="leading-relaxed">{{ $product['description'] }}</p>
                  <div class="flex flex-col mt-6 pb-5 border-b-2 border-gray-100 mb-5">
                    <div class="flex">
                       Dilihat : {{ $product['viewers'] }}
                    </div>
                    <div class="flex">
                       Maksimal Revisi : {{ $product['revision_amount'] }}
                    </div>
                    <div class="flex">
                       <span>Penjual : <a class="text-blue-600 hover:text-blue-500" href="{{ url('user/' . $product['seller']['username']) }}">{{ $product['seller']['name'] }}</a></span>
                    </div>
                  </div>
                  <div class="flex">
                    <span class="title-font font-medium text-2xl text-gray-900">{{ 'Rp' . number_format($product['price'], 0, ',', '.') }} <span class="text-xs">{{ $product['pricetype']['name'] }}</span></span>
                    @if(auth()->check())
                     @if($product['seller_id'] == auth()->user()->id)
                     <a href="{{ url('user/studio/' . auth()->user()->username) }}" class="flex ml-auto text-white bg-blue-600 border-0 py-2 px-6 focus:outline-none rounded duration-500">Edit di Studio</a>
                     @else
                     <button class="flex ml-auto text-white bg-blue-600 border-0 py-2 px-6 focus:outline-none rounded duration-500" wire:click="setOrder">Chat & Nego</button>
                     @endif
                    @endif
                    </div>
               </div>
               <div class="grid lg:grid-cols-4 grid-cols-2 my-2 gap-2">
                  @foreach ($product['images'] as $item)
                  <div class="cursor-pointer" wire:click="setCover('{{ $item['getLarge']['path'] }}')">
                     <img alt="{{ $item['getSmall']['new_name'] }}" class="w-full h-36 object-cover object-center rounded" src="{{ $item['getSmall']['path'] }}">
                  </div>
                  @endforeach
                  @if(! empty($product['youtube_url']))
                  <div>
                    <iframe src="https://www.youtube.com/embed/{{ $product['youtube_url'] }}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                  </div>
                  @endif
               </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper-container">
               <h1 class="text-gray-900 text-center mt-16 text-3xl title-font font-medium">Feedbacks</h1>
               @if($this->reviews > 0)
               <!-- Additional required wrapper -->
               <div class="swiper-wrapper">
                   @foreach ($product['requests'] as $item)
                    @if (! empty($item['contract']['feedback']))
                    <!-- Slides -->
                    <div class="swiper-slide">
                       <div class="flex items-center justify-center px-5 py-24">
                          <div class="w-full mx-auto max-w-xl rounded-lg bg-white dark:bg-gray-800 shadow-lg px-5 pt-5 pb-10 text-gray-800 dark:text-gray-50">
                             <div class="w-full pt-1 text-center pb-5 -mt-16 mx-auto">
                                <a class="block relative">
                                <img alt="profil" src="{{ $item['contract']['feedback']['user']['profile_photo_url'] }}" class="mx-auto object-cover rounded-full h-20 w-20 "/>
                                </a>
                             </div>
                             <div class="w-full mb-10">
                                <div class="text-3xl text-indigo-500 text-left leading-tight h-3">
                                   “
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-100 text-center px-5">
                                   {{ $item['contract']['feedback']['comment'] }}
                                </p>
                                <div class="text-3xl text-indigo-500 text-right leading-tight h-3 -mt-3">
                                   ”
                                </div>
                             </div>
                             <div class="w-full">
                                <p class="text-md text-indigo-500 font-bold text-center">
                                   {{ $item['contract']['feedback']['user']['name'] }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-300 text-center">
                                   {{ '@' . $item['contract']['feedback']['user']['username'] }}
                                </p>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- Slides -->
                    @endif
                   @endforeach
               </div>
               <!-- If we need pagination -->
               <div class="swiper-pagination"></div>
               <!-- If we need navigation buttons -->
               <div class="swiper-button-prev"></div>
               <div class="swiper-button-next"></div>
               @else
            </div>
               <div class="flex flex-col mt-16">
                  <div class="m-auto">
                     <img src="{{ Storage::disk('s3')->url('icons/emtproduct.svg') }}" alt="">
                  </div>
                  <div>
                     <p class="py-2 text-center">Belum ada feedback</p>
                  </div>
               </div>
            @endif
         </div>
      </section>
   {{-- </x-app-layout> --}}
   @push('styles')
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
   @endpush
   @push('scripts')
      <script>
      var mySwiper = new Swiper ('.swiper-container', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
         })
   </script>
   @endpush
</div>