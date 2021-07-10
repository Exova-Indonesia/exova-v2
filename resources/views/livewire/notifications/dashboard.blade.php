<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Notifications') }}
            </h2>
        </x-slot>
        <div class="mx-8">
            @livewire('studios.components.notifikasi')
        </div>
    </x-app-layout>
</div>
