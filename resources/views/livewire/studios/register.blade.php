<div>
<x-app-layout>
    <x-slot name="navbar">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Freelancer') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
                <div class="text-right">
                    <x-jet-button wire:loading.attr="disabled" wire:click="next">
                        {{ __('Lanjutkan') }}
                    </x-jet-button>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
</div>