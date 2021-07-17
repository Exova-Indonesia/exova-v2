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
                  {{ __('Freelancer') }}
               </h2>
            </div>
         </div>
      </x-slot>
      <div class="overflow-x-hidden">
         <div class="p-10 text-center lg:w-3/5 w-full m-auto">
            <x-jet-input type="text" class="mt-1 block w-full"
            placeholder="{{ __('Cari Freelancer') }}"
            x-ref="search"
            wire:model="search" />
      </div>
      <div>
         <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 grid lg:grid-cols-2 grid-cols-1 gap-2">
            @foreach ($data as $item)
               @livewire('components.card-freelancer', ['data' => $item], key($item->id))
            @endforeach
         </div>
      </div>
   </x-app-layout>
</div>