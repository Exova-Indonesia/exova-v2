<div>
   <nav class="relative py-6 bg-white">
      <div class="container mx-auto px-4 flex justify-between items-center">
         <a class="text-gray-700 text-3xl font-bold leading-none" href="#"><img src="{{ asset('images/exova.png') }}" alt="" width="120"></a>
         <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-gray-700 p-3">
               <svg class="block h-4 w-4 fill-current" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title></title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
               </svg>
            </button>
         </div>
         <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
            <li><a class="text-sm text-gray-700" href="{{ url('/') }}">@lang('navigation.menu.menu-1')</a></li>
            <li class="text-gray-400">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-700 hover:text-gray-700" href="#kategori">@lang('navigation.menu.menu-2')</a></li>
            <li class="text-gray-400">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-700 hover:text-gray-700" href="{{ url('products?filter=trends') }}">@lang('navigation.menu.menu-3')</a></li>
            <li class="text-gray-400">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-700 hover:text-gray-700" href="{{ url('products') }}">@lang('navigation.menu.menu-5')</a></li>
            <li class="text-gray-400">
               <svg class="w-4 h-4 current-fill" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
               </svg>
            </li>
            <li><a class="text-sm text-gray-700 hover:text-gray-700" href="{{ url('event') }}">@lang('navigation.menu.menu-6')</a></li>
         </ul>
         @auth
         {{-- Wallet --}}
         <div class="hidden lg:inline-block lg:ml-auto mt-3">
         <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
            <a class="hidden cursor-pointer lg:inline-block lg:mr-3 p-2 text-sm text-gray-700 rounded-full transition duration-200">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
               </svg>
            </a>
            </x-slot>
            <x-slot name="content">
               <!-- Balance Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                     {{ __('Balance Account') }}
                  </div>
               <x-jet-dropdown-link>
                  {{ 'Rp' . number_format(auth()->user()->balance, 0, ',', '.') }}
               </x-jet-dropdown-link>
               <x-jet-dropdown-link href="{{ route('studio.dashboard', auth()->user()->username) }}">
                  {{ __('Lihat Detail') }}
               </x-jet-dropdown-link>
            </x-slot>
         </x-jet-dropdown>
         </div>
         {{-- Cart --}}
         <a class="hidden @if(session()->get('cart')) animate-bounce @endif lg:inline-block lg:mr-3 p-2 text-sm text-gray-700 rounded-full transition duration-200" href="cart">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
         </a>
         {{-- Notif --}}
         <a class="hidden lg:inline-block lg:mr-3 p-2 text-sm text-gray-700 rounded-full transition duration-200" href="{{ url('notifications') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
         </a>
         {{-- Messages --}}
         <a class="hidden lg:inline-block lg:mr-3 p-2 text-sm text-gray-700 rounded-full transition duration-200" href="{{ url('chats') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
         </a>
         @endauth
         @guest
         <a class="hidden lg:inline-block py-2 px-6 bg-pink-500 hover:bg-pink-600 text-sm text-white font-bold rounded-t-full rounded-l-full transition duration-200" href="{{ route('login') }}">Login</a>
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
                     @lang('navigation.menu.profile')
                  </x-jet-dropdown-link>
                  <x-jet-dropdown-link href="{{ route('contracts.show') }}">
                     @lang('navigation.menu.contract')
                  </x-jet-dropdown-link>
                  <x-jet-dropdown-link href="{{ route('studio.dashboard', auth()->user()->username) }}">
                     @lang('navigation.menu.studio')
                  </x-jet-dropdown-link>
                  <x-jet-dropdown-link href="{{ route('wishlist.dashboard') }}">
                     @lang('navigation.menu.wishlist')
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
            <button class="navbar-close">
               <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
               </svg>
            </button>
         </div>
         <div>
            <ul>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('/') }}">@lang('navigation.menu.menu-1')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="#kategori">@lang('navigation.menu.menu-2')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('products?filter=trends') }}">@lang('navigation.menu.menu-3')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('products') }}">@lang('navigation.menu.menu-5')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('event') }}">@lang('navigation.menu.menu-6')</a></li>
               @auth
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('user/profile') }}">@lang('navigation.menu.profile')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('contracts') }}">@lang('navigation.menu.contract')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('user/studio' , auth()->user()->username) }}">@lang('navigation.menu.studio')</a></li>
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" href="{{ url('wishlists') }}">@lang('navigation.menu.wishlist')</a></li>
               @endauth
               @auth
               <form method="POST" action="{{ route('logout') }}">
               @csrf
               <li class="mb-1"><a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-green-50 hover:text-green-600 rounded" onclick="event.preventDefault();
                        this.closest('form').submit();">{{ __('Log Out') }}</a></li>
               </form>
               @endauth
         </ul>
         </div>
         <div class="mt-auto">
            @auth
            <center>
               @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                 <button class="text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                    <img class="h-24 w-24 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                 </button>
                 <div>
                    <h5 class="text-lg font-semibold uppercase">
                       {{ Auth::user()->name }}
                    </h5>
                 </div>
                 <div class="flex justify-between py-8">
                    <span>
                       Saldo
                    </span>
                    <span>
                       {{ 'Rp' . number_format(auth()->user()->balance, 0, ',', '.') }}
                    </span>
                 </div>
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
         <center class="py-4">
            <a class="lg:hidden inline-block lg:ml-auto lg:mr-3 p-2 text-sm text-gray-700 rounded-full transition duration-200" href="cart">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
               </svg>
            </a>
            <a class="lg:hidden inline-block lg:mr-3 p-2 text-sm text-gray-700 rounded-full transition duration-200" href="{{ url('notifications') }}">
               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
               </svg>
            </a>
            <a class="lg:hidden inline-block lg:mr-3 p-2 text-sm text-gray-700 rounded-full transition duration-200" href="{{ url('chats') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
            </a>
         </center>
         @endauth
         @guest
         <div class="pt-6"><a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-blue-600 hover:bg-gray-100 rounded-l-xl text-white rounded-t-xl" href="{{ route('login') }}">Sign in</a><a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-purple-600 hover:bg-purple-700 rounded-l-xl rounded-t-xl" href="{{ route('register') }}">Sign Up</a></div>
         @endguest
            <p class="my-4 text-xs text-center text-gray-400">
               <span>© {{ date('Y') . ' ' . config('app.name') }}, All rights reserved.</span>
            </p>
         </div>
      </nav>
   </div>
</div>