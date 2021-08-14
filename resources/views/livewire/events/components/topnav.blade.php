<div class="mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
  <div class="relative flex items-center justify-between">
    <a href="{{ route('event.dashboard') }}" aria-label="Company" title="Company" class="inline-flex items-center">
      <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Exova Event</span>
    </a>
    <ul class="flex items-center hidden space-x-8 lg:flex">
      <li><a href="{{ url('event') }}" title="Home" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Home</a></li>
      <li><a href="{{ url('event/webinar') }}" title="Webinar" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Webinar</a></li>
      <li><a href="{{ url('event/competition') }}" title="Kompetisi" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Kompetisi</a></li>
      <li><a href="{{ url('event/training') }}" title="Pelatihan" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pelatihan</a></li>
    </ul>
    <ul class="flex items-center hidden space-x-8 lg:flex">
    @guest
    <li>
        <a
          href="{{ route('login') }}"
          class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-gray-800 hover:bg-gray-900 focus:shadow-outline focus:outline-none"
          aria-label="Sign In"
          title="Sign In"
        >
          Sign In
        </a>
    </li>
    @else
    <li>
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
    </li>
    @endguest
    </ul>
    <!-- Mobile menu -->
    <div class="lg:hidden">
      <button aria-label="Open Menu" title="Open Menu" class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline hover:bg-deep-purple-50 focus:bg-deep-purple-50" wire:click="$toggle('mobileMenu')">
        <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
          <path fill="currentColor" d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z"></path>
          <path fill="currentColor" d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z"></path>
          <path fill="currentColor" d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z"></path>
        </svg>
      </button>
      @if($mobileMenu)
      <!-- Mobile menu dropdown -->
      <div class="absolute top-0 left-0 w-full z-20">
        <div class="p-5 bg-white border rounded shadow-sm">
          <div class="flex items-center justify-between mb-4">
            <div>
              <a href="/" aria-label="Company" title="Company" class="inline-flex items-center">
                <span class="ml-2 text-xl font-bold tracking-wide text-gray-800 uppercase">Exova Event</span>
              </a>
            </div>
            <div>
              <button wire:click="$toggle('mobileMenu')" aria-label="Close Menu" title="Close Menu" class="p-2 -mt-2 -mr-2 transition duration-200 rounded hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                  <path
                    fill="currentColor"
                    d="M19.7,4.3c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4l6.3,6.3l-6.3,6.3 c-0.4,0.4-0.4,1,0,1.4C4.5,19.9,4.7,20,5,20s0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l6.3-6.3C20.1,5.3,20.1,4.7,19.7,4.3z"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
          <nav>
            <ul class="space-y-4">
              <li><a href="{{ url('event') }}" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Home</a></li>
              <li><a href="{{ url('event/webinar') }}" aria-label="Our product" title="Our product" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Webinar</a></li>
              <li><a href="{{ url('event/competition') }}" aria-label="Product pricing" title="Product pricing" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Kompetisi</a></li>
              <li><a href="{{ url('event/training') }}" aria-label="About us" title="About us" class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-deep-purple-accent-400">Pelatihan</a></li>
            </ul>
          </nav>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>