<div>
    {{-- <x-app-layout> --}}
    <x-slot name="navbar">
         <div class="flex justify-between">
            <div>
               <a href="{{ url('/') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
               </a>
            </div>
            <div>
               <h2 class="font-semibold text-xl capitalize text-gray-800 leading-tight">
                  {{ __($type) }}
               </h2>
            </div>
         </div>
      </x-slot>
      <div class="overflow-x-hidden">
         <div class="p-10 text-center lg:w-3/5 w-full m-auto">
            <div class="justify-between flex">
               <x-simple-select-field type="text" class="m-1 block w-1/4"
                  x-ref="type"
                  wire:model="type">
                  <option value="jasa">Jasa</option>
                  <option value="freelancer">Freelancer</option>
               </x-simple-select-field>
               <x-jet-input type="text" class="m-1 block w-3/4"
                  placeholder="{{ __('Cari ' . $type) }}"
                  x-ref="search"
                  wire:keydown.enter="$emit('setSearch', $message)"
                  wire:model.lazy="search" />
            </div>
         </div>
         <div class="flex flex-col w-screen min-h-screen p-10 bg-gray-100 text-gray-800">
            @if ($type == 'freelancer')
            @livewire('studios.list-freelancers', ['search' => $search])
            @elseif(($type == 'jasa'))
            @livewire('components.list-products', ['search' => $search])
            @endif
         </div>
      </div>
    {{-- </x-app-layout> --}}
</div>
