<div>
    <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-100 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-end">
            <x-jet-button class="ml-2 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:loading.attr="disabled">
                {{ __('Tandai dibaca') }}
            </x-jet-button>
        </div>
    </div>
    @livewire('components.notifikasi-bar')
</div>
