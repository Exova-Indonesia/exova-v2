<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins">
      <!-- Styles -->
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      @livewireStyles
      <!-- Scripts -->
      <script src="{{ mix('js/app.js') }}" defer></script>
      <script src="{{ asset('js/main.js') }}" defer></script>
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
      <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   </head>
   <body class="font-sans antialiased">
      <x-jet-banner />
      <div class="min-h-screen bg-gray-100">
         @if(isset($navbar))
         @livewire('navigation-menu')
         @endif
         <!-- Page Heading -->
         @if (isset($header))
         <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
               {{ $header }}
            </div>
         </header>
         @endif
         <!-- Page Content -->
         <main>
            {{ $slot }}
         </main>
      </div>
      @if(isset($footer))
      @livewire('layouts.footer')
      @endif
      @stack('modals')
      @livewireScripts
      <div>
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
</div>
   </body>
</html>