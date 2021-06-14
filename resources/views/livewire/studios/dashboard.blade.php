<div>
   <div class="flex flex-no-wrap">
      <!-- Sidebar starts -->
      <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
      <div id="mobile-nav" style="min-height: 716px" class="z-10 w-64 absolute sm:relative bg-gray-900 shadow md:h-full flex-col transition ease-in-out duration-500 justify-between flex">
         <button aria-label="toggle sidebar" id="openSideBar" class="lg:hidden h-10 w-10 bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none" onclick="sidebarHandler(true)">
            <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path stroke="none" d="M0 0h24v24H0z" />
               <circle cx="6" cy="10" r="2" />
               <line x1="6" y1="4" x2="6" y2="8" />
               <line x1="6" y1="12" x2="6" y2="20" />
               <circle cx="12" cy="16" r="2" />
               <line x1="12" y1="4" x2="12" y2="14" />
               <line x1="12" y1="18" x2="12" y2="20" />
               <circle cx="18" cy="7" r="2" />
               <line x1="18" y1="4" x2="18" y2="5" />
               <line x1="18" y1="9" x2="18" y2="20" />
            </svg>
         </button>
         <div class="px-8">
            <div class="h-16 w-full flex items-center mb-8">
               <img src="https://assets.exova.id/img/logo.png" alt="" width="120">
            </div>
            <center>
               @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
               <button class="text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
               <img class="h-24 w-24 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
               </button>
               <div class="mt-2 text-gray-400">
                  <span>
                  {{ Auth::user()->name }}
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
            <ul class="mt-12">
               <li wire:click="loadContent('dashboard')" class="flex w-full justify-between text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                     </svg>
                     <span class="text-sm ml-2">Dashboard</span>
                  </a>
                  <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">5</div>
               </li>
               <li wire:click="loadContent('notifikasi')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                     </svg>
                     <span class="text-sm ml-2">Notifikasi</span>
                  </a>
                  <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">8</div>
               </li>
               <li wire:click="loadContent('pesan')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                     </svg>
                     <span class="text-sm ml-2">Pesan</span>
                  </a>
                  <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">8</div>
               </li>
               <li wire:click="loadContent('products')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                     </svg>
                     <span class="text-sm ml-2">Products</span>
                  </a>
                  <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">8</div>
               </li>
               <li wire:click="loadContent('analytics')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                     </svg>
                     <span class="text-sm ml-2">Analytics</span>
                  </a>
               </li>
               <li wire:click="loadContent('orderan')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none " >
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                     </svg>
                     <span class="text-sm ml-2">Orderan</span>
                  </a>
               </li>
               <li wire:click="loadContent('invoices')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                     </svg>
                     <span class="text-sm ml-2">Invoices</span>
                  </a>
                  <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">25</div>
               </li>
               <li wire:click="loadContent('pendapatan')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                     </svg>
                     <span class="text-sm ml-2">Pendapatan</span>
                  </a>
               </li>
               <li wire:click="loadContent('achievment')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-6">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                     </svg>
                     <span class="text-sm ml-2">Achievment</span>
                  </a>
               </li>
               <li wire:click="loadContent('settings')"  class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center">
                  <a class="flex items-center focus:outline-none ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                     </svg>
                     <span class="text-sm ml-2">Settings</span>
                  </a>
               </li>
            </ul>
            <div class="flex justify-center mt-48 mb-4 w-full">
               <div class="relative">
                  <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                     </svg>
                  </div>
                  <input class="bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-900 rounded w-full text-sm text-gray-300 placeholder-gray-400 bg-gray-100 pl-10 py-2" type="text" placeholder="Search" />
               </div>
            </div>
         </div>
         <div class="px-8 border-t border-gray-700">
            <ul class="w-full flex items-center justify-between bg-gray-900">
               <li class="cursor-pointer text-white pt-5 pb-3">
                  <button aria-label="show notifications" class="focus:outline-none  rounded ">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                     </svg>
                  </button>
               </li>
               <li class="cursor-pointer text-white pt-5 pb-3">
                  <button aria-label="open logs" class="focus:outline-none  rounded ">
                     <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"></path>
                        <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                        <line x1="10" y1="12" x2="14" y2="12"></line>
                     </svg>
                  </button>
               </li>
            </ul>
         </div>
      </div>
      <!-- Remove class [ h-64 ] when adding a card block -->
      <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">
         <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
         <div class="text-3xl mb-4 capitalize font-medium max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $title }}
         </div>
        @if($title == 'dashboard')
            @livewire('studios.components.dashboard')
        @endif
      </div>
   </div>
   <script>
      var sideBar = document.getElementById("mobile-nav");
      var toggler = document.getElementById("mobile-toggler");
      let moved = true;
      function sidebarHandler() {
      if (moved) {
      sideBar.style.transform = "translateX(0px)";
      moved = false;
      } else {
      sideBar.style.transform = "translateX(-260px)";
      moved = true;
      }
      }
      
   </script>
</div>