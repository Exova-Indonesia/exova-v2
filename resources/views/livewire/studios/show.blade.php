<div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
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
