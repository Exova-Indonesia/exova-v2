<div>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
        <div class="w-full">
            <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="harga" value="{{ __('Harga Project') }}" />
            <x-jet-input type="text" class="my-1 block w-full"
                placeholder="{{ __('Harga') }}"
                x-ref="harga"
                wire:model="harga" />
            </div>
            <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="harga" value="{{ __('Harga Revisian') }}" />
            <x-jet-input type="text" class="my-1 block w-full"
                placeholder="{{ __('Harga') }}"
                x-ref="harga"
                wire:model="harga" />
            </div>
        </div>
        <div class="w-full">
            <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="harga" value="{{ __('Tipe Harga') }}" />
            <x-jet-input type="text" class="my-1 block w-full"
                placeholder="{{ __('Harga') }}"
                x-ref="harga"
                wire:model="harga" />
            </div>
            <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="harga" value="{{ __('Tipe Harga') }}" />
            <x-jet-input type="text" class="my-1 block w-full"
                placeholder="{{ __('Harga') }}"
                x-ref="harga"
                wire:model="harga" />
            </div>
        </div>
    </div>
    @if ($count <= 3)
    <div class="flex justify-end">
        <x-jet-button wire:click="AddIncrement" class="mt-4 justify-end flex bg-green-500 hover:bg-green-600 focus:border-green-300 active:bg-green-900">
            {{ __('Tambahan') }}
        </x-jet-button>
    </div>
    @endif

    @for ($i = 1; $i < $count; $i++)
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
        <div class="w-full mt-2 flex flex-col mt-4">
        <x-jet-label for="harga" value="{{ __('Nama') }}" />
        <x-jet-input type="text" class="my-1 block w-full"
            placeholder="{{ __('Nama') }}"
            x-ref="harga"
            wire:model="harga" />
        </div>
        <div class="w-full mt-2 flex flex-col mt-4">
        <x-jet-label for="harga" value="{{ __('Deskripsi') }}" />
        <x-jet-input type="text" class="my-1 block w-full"
            placeholder="{{ __('Deskripsi') }}"
            x-ref="harga"
            wire:model="harga" />
        </div>
        <div class="w-full mt-2 flex flex-col mt-4">
        <x-jet-label for="harga" value="{{ __('Harga') }}" />
        <x-jet-input type="text" class="my-1 block w-full"
            placeholder="{{ __('Harga') }}"
            x-ref="harga"
            wire:model="harga" />
        </div>
    </div>
    @endfor
</div>
