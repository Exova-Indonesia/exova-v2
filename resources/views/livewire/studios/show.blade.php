<div>
<x-app-layout>
   <x-slot name="header">
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
               {{ __('Profile') }}
            </h2>
         </div>
      </div>
   </x-slot>
<div class="w-full">
   <div class="flex items-start justify-center">
      <div aria-label="group of cards" class="w-full">
         <div class="flex lg:flex-row flex-col mx-auto dark:bg-gray-800 shadow rounded">
            @livewire('studios.components.profile', ['user' => $user])
            @foreach ($user['products'] as $item)
            @livewire('studios.components.feeds', ['product' => $item], key($item->id))
            @endforeach
         </div>
      </div>
   </div>
</div>
</x-app-layout>
</div>
