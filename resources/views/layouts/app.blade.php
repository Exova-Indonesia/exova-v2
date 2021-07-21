<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="icon" href="{{ Storage::disk('s3')->url('icons/exova.png') }}">
      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins">
      <!-- Styles -->
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />
      @stack('styles')
      @livewireStyles
      <!-- Scripts -->
      <script
      src="https://maps.googleapis.com/maps/api/js?key={{ env('GMAPS_KEY') }}&libraries=places&v=weekly"
      async
      ></script>
      <script src="{{ asset('js/upload.js') }}" defer></script>
      <script src="{{ asset('js/maps.js') }}" defer></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="{{ mix('js/app.js') }}" defer></script>
      <script src="{{ asset('js/main.js') }}" defer></script>
      <script src="{{ asset('js/currency.js') }}" defer></script>
      <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
      <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-9DZV6LVHTJ"></script>
      <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-9DZV6LVHTJ');
      </script>
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
      @stack('scripts')
      <div>
   <script>
      window.addEventListener('notification', event => {
         const Toast = Swal.mixin({
         toast: true,
         position: 'top-end',
         showConfirmButton: false,
         timer: 3000,
         timerProgressBar: true,
         didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
         }
         })

         Toast.fire({
            icon: event.detail.type,
            title: event.detail.title
         })
      })
   </script>
</div>
   </body>
</html>