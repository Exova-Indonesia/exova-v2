<div>
   {{-- <x-app-layout> --}}
      <x-slot name="header">
         @livewire('events.components.topnav')
      </x-slot>
      <div class="dark:bg-gray-800">
         <div class="container mx-auto dark:bg-gray-800 mt-10 rounded px-4">
            <div class="xl:w-full border-b border-gray-300 dark:border-gray-700 py-5">
               <div class="flex w-11/12 mx-auto xl:w-full xl:mx-0 items-center">
                  <p class="text-lg text-gray-800 dark:text-gray-100 font-bold">Daftar Hadir - {{ $webinar['title'] }}</p>
               </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
               <div class="mt-4 mx-1">
                  <x-jet-label for="name" value="{{ __('Nama Lengkap') }}" />
                  <x-jet-input autocomplete="off" type="text" class="mt-1 block w-full"
                     id="name"
                     wire:model="name" />
                  <x-jet-input-error for="name" class="mt-2" />
               </div>
               <div class="mt-4 mx-1">
                  <x-jet-label for="email" value="{{ __('Email') }}" />
                  <x-jet-input autocomplete="off" type="email" class="mt-1 block w-full"
                     id="email"
                     wire:model="email" />
                  <x-jet-input-error for="email" class="mt-2" />
               </div>
               <div class="mt-4 mx-1">
                  <x-jet-label for="instansi" value="{{ __('Instansi') }}" />
                  <x-jet-input autocomplete="off" type="email" class="mt-1 block w-full"
                     id="instansi"
                     wire:model="instansi" />
                  <x-jet-input-error for="instansi" class="mt-2" />
               </div>
               <div class="mt-4 mx-1">
                  <x-jet-label for="status" value="{{ __('Status') }}" />
                  <x-simple-select-field autocomplete="off" type="email" class="mt-1 block w-full"
                     id="status"
                     wire:model="status">
                     <option value="1" selected>Pembicara</option>
                     <option value="2">Peserta</option>
                  </x-simple-select-field>
                  <x-jet-input-error for="status" class="mt-2" />
               </div>
            </div>
            <div class="mt-8">
               <a wire:click="setAttendant"
                  class="cursor-pointer inline-flex w-full items-center justify-center h-12 px-6 mr-6 font-medium tracking-wide text-white transition duration-200 rounded-lg shadow-md bg-gray-800 hover:bg-gray-900 focus:shadow-outline focus:outline-none"
                  >
               Kirim
               </a>
            </div>
         </div>
      </div>
   {{-- </x-app-layout> --}}
</div>