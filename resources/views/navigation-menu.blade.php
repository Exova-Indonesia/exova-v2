<div>
   <nav class="relative py-6 bg-gray-900">
      <div class="container mx-auto px-4 flex justify-between items-center">
         <a class="text-white text-3xl font-bold leading-none" href="#"><img src="https://assets.exova.id/img/logo.png" alt="" width="120"></a>
         <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-white p-3">
               <svg class="block h-4 w-4 fill-current" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>Mobile menu</title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
               </svg>
            </button>
         </div>
         <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
            <li><a class="text-sm text-white font-bold" href="#">@lang('navigation.menu.menu-1')</a></li>
            <li class="text-gray-800">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-300 hover:text-white" href="#kategori">@lang('navigation.menu.menu-2')</a></li>
            <li class="text-gray-800">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-300 hover:text-white" href="#">@lang('navigation.menu.menu-3')</a></li>
            <li class="text-gray-800">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-300 hover:text-white" href="#">@lang('navigation.menu.menu-4')</a></li>
            <li class="text-gray-800">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-300 hover:text-white" href="#">@lang('navigation.menu.menu-5')</a></li>
         </ul>
         @auth
         {{-- Cart --}}
         <a class="hidden @if(session()->get('cart')) animate-bounce @endif lg:inline-block lg:ml-auto lg:mr-3 p-2 text-sm text-white rounded-full transition duration-200" href="cart">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
         </a>
         {{-- Notif --}}
         <a class="hidden lg:inline-block lg:mr-3 p-2 text-sm text-white rounded-full transition duration-200" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
         </a>
         {{-- Uploads --}}
         <a class="hidden lg:inline-block lg:mr-3 p-2 text-sm text-white rounded-full transition duration-200" href="#">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
            </svg>
         </a>
         @endauth
         @guest
         <a class="hidden lg:inline-block py-2 px-6 bg-green-500 hover:bg-green-600 text-sm text-white font-bold rounded-l-xl rounded-t-xl transition duration-200" href="#">Login</a>
         @else
         <div class="hidden lg:block">
            <x-jet-dropdown align="right" width="48">
               <x-slot name="trigger">
                  @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                  <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                     <img class="h-12 w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                  </button>
                  @else
                  <span class="inline-flex rounded-md">
                     <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                        {{ Auth::user()->name }}
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                           <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                     </button>
                  </span>
                  @endif
               </x-slot>
               <x-slot name="content">
                  <!-- Account Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                     {{ __('Manage Account') }}
                  </div>
                  <x-jet-dropdown-link href="{{ route('profile.show') }}">
                     {{ __('Profile') }}
                  </x-jet-dropdown-link>
                  <x-jet-dropdown-link href="{{ route('studio.dashboard', auth()->user()->username) }}">
                     {{ __('Studio') }}
                  </x-jet-dropdown-link>
                  @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                  <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                     {{ __('API Tokens') }}
                  </x-jet-dropdown-link>
                  @endif
                  <div class="border-t border-gray-100"></div>
                  <!-- Authentication -->
                  <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <x-jet-dropdown-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                     </x-jet-dropdown-link>
                  </form>
               </x-slot>
            </x-jet-dropdown>
         </div>
         @endguest
      </div>
   </nav>
   <div class="hidden navbar-menu relative z-50">
      <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
      <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
         <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#"><img class="h-10" src="atis-assets/logo/atis/atis-mono-black.svg" alt="" width="auto"></a>
            <button class="navbar-close">
               <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
               </svg>
            </button>
         </div>
         <div>
            <ul>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="#">@lang('navigation.menu.menu-1')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="#">@lang('navigation.menu.menu-2')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="#">@lang('navigation.menu.menu-3')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="#">@lang('navigation.menu.menu-4')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="#">@lang('navigation.menu.menu-5')</a></li>
            </ul>
         </div>
         <div class="mt-auto">
            <center>
               @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                 <button class="text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-24 w-24 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                 </button>
                 @else
                 <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                       {{ Auth::user()->name }}
                       <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                       </svg>
                    </button>
                 </span>
                 @endif
            </center>
         @auth
         <center class="py-4">
            <a class="lg:hidden inline-block lg:ml-auto lg:mr-3 p-2 text-sm text-gray-900 rounded-full transition duration-200" href="#">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
               </svg>
            </a>
            <a class="lg:hidden inline-block lg:mr-3 p-2 text-sm text-gray-900 rounded-full transition duration-200" href="#">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
               </svg>
            </a>
            <a class="lg:hidden inline-block lg:mr-3 p-2 text-sm text-gray-900 rounded-full transition duration-200" href="#">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
               </svg>
            </a>
         </center>
         @endauth
         @guest
         <div class="pt-6"><a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-l-xl rounded-t-xl" href="#">Sign in</a><a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-green-600 hover:bg-green-700 rounded-l-xl rounded-t-xl" href="#">Sign Up</a></div>
         @endguest
            <p class="my-4 text-xs text-center text-gray-400">
               <span>&copy; 2020 All rights reserved.</span>
            </p>
            <div class="text-center"><a class="inline-block px-1" href="#"><img src="atis-assets/social/facebook.svg" alt=""></a><a class="inline-block px-1" href="#"><img src="atis-assets/social/twitter.svg" alt=""></a><a class="inline-block px-1" href="#"><img src="atis-assets/social/instagram.svg" alt=""></a></div>
         </div>
      </nav>
   </div>
</div>