<div>
{{-- <x-app-layout> --}}
    <x-slot name="header">
        @livewire('events.components.topnav')
    </x-slot>
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
  <div class="flex flex-col items-center justify-between w-full mb-10 lg:flex-row">
    <div class="mb-16 lg:mb-0 lg:max-w-lg lg:pr-5">
      <div class="max-w-xl mb-6">
        <div>
          <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
            Exova Event
          </p>
        </div>
        <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
          Sudahi sedihmu kawan<br class="hidden md:block" />
          mari
          <span class="inline-block text-blue-700">gabung Exova</span>
        </h2>
        <p class="text-base text-gray-700 md:text-lg">
          If you’re trying to create a company, it’s like baking a cake. You have to have all the ingredients in the right proportion <br> <span class="text-sm">-Elon Musk, CEO SpaceX & Tesla</span>
        </p>
      </div>
      <div class="flex items-center space-x-3">
        <a
            href="/"
            class="inline-flex items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded shadow-md bg-gray-800 hover:bg-gray-900 focus:shadow-outline focus:outline-none"
        >
            Xplore Exova
        </a>
      </div>
    </div>
    <div class="flex items-center justify-center lg:w-1/2">
      <div class="w-2/5">
        <img class="object-cover" src="{{ asset('images/IphoneExova.png') }}" alt="" />
      </div>
      <div class="w-5/12 -ml-16 lg:-ml-32">
        <img class="object-cover" src="{{ asset('images/IphoneExova.png') }}" alt="" />
      </div>
    </div>
  </div>
</div>
{{-- </x-app-layout> --}}
</div>
