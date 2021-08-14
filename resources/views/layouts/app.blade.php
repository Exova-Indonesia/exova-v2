<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta name="description" content="Exova adalah platform jual - beli jasa di bidang dokumentasi. Khusus di Exova yaitu bidang Traditional & Budaya seperti. Prewedding, Wedding, Upacara Keagamaan, Upacara Adat, Event Budaya, dll">
      <meta name="keywords" content="Prewedding, Wedding, Upacara Keagamaan, Upacara Adat, Event Budaya, Exova, Exova ID, Exova Indonesia, Freelancer, Dokumentasi, Traditional, Culture, E-commerce, Undangan Online, Marketplace, Nikah">
      <meta name="author" content="{{ env('APP_NAME') }}">
      <title>{{ __('Exova - Traditional & Culture Documentation Marketplace') }}</title>
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
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
         new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         })(window,document,'script','dataLayer','GTM-5NDFH6Q');
      </script>
      <!-- End Google Tag Manager -->
   </head>
   <body class="font-sans antialiased">
      <!-- Facebook Pixel Code -->
      <script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '4516604601736085'); fbq('track', 'PageView');</script><noscript> <img height="1" width="1" src="https://www.facebook.com/tr?id=4516604601736085&ev=PageView&noscript=1"/></noscript>
      <!-- End Facebook Pixel Code -->
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5NDFH6Q"
         height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <div wire:offline class="bg-red-600 p-4">
         <p class="text-center text-red-50 text-base uppercase font-semibold">
            Tidak ada koneksi
         </p>
      </div>
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
   </body>
</html>