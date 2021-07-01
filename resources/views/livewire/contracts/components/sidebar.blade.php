<div class="flex bg-gray-900 flex-col flex-none overflow-auto w-24 hover:w-64 group lg:max-w-sm md:w-2/5 transition-all duration-300 ease-in-out">
   <div class="header p-4 flex flex-col justify-center items-center flex-none mt-4">
      <div class="md:w-24 md:h-24 w-16 h-16 relative flex flex-shrink-0">
         <img class="rounded-full w-full h-full object-cover" alt="ravisankarchinnam"
            src="{{ auth()->user()->profile_photo_url }}"/>
      </div>
      <div>
         <p class="text-md text-center font-bold hidden md:block group-hover:block pt-2">Artha</p>
         <span class="text-sm hidden md:block text-gray-500">Your Clients</span>
      </div>
   </div>
   <div class="contacts p-2 flex-1 overflow-y-scroll">
      <div wire:click="loadContent('details')" class="flex justify-between items-center px-6 p-3 hover:bg-gray-800 rounded-lg relative cursor-pointer">
         <div class="relative flex flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
         </div>
         <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
            <p>Order Details</p>
         </div>
      </div>
      <div wire:click="loadContent('edit')" class="flex justify-between items-center px-6 p-3 hover:bg-gray-800 rounded-lg relative cursor-pointer">
         <div class="relative flex flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
         </div>
         <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
            <p>Edit Contract</p>
         </div>
      </div>
      <div wire:click="loadContent('chats')" class="flex justify-between items-center px-6 p-3 hover:bg-gray-800 rounded-lg relative cursor-pointer">
         <div class="relative flex flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
            </svg>
         </div>
         <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
            <p>Pesan</p>
         </div>
      </div>
      <div wire:click="loadContent('files')" class="flex justify-between items-center px-6 p-3 hover:bg-gray-800 rounded-lg relative cursor-pointer">
         <div class="relative flex flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
            </svg>
         </div>
         <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
            <p>Files</p>
         </div>
      </div>
      <div wire:click="loadContent('terms')" class="flex justify-between items-center px-6 p-3 hover:bg-gray-800 rounded-lg relative cursor-pointer">
         <div class="relative flex flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
         </div>
         <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
            <p>Ketentuan</p>
         </div>
      </div>
      <div wire:click="loadContent('feedback')" class="flex justify-between items-center px-6 p-3 hover:bg-gray-800 rounded-lg relative cursor-pointer">
         <div class="relative flex flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
         </div>
         <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
            <p>Feedback</p>
         </div>
      </div>
      <div wire:click="loadContent('end')" class="flex justify-between items-center px-6 p-3 hover:bg-gray-800 rounded-lg relative cursor-pointer">
         <div class="relative flex flex-shrink-0">
<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
</svg>
         </div>
         <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block group-hover:block">
            <p>End Contract</p>
         </div>
      </div>
   </div>
</div>