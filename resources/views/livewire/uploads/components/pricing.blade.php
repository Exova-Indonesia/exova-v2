<div>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
        <div class="w-full">
            <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="harga" value="{{ __('Harga Project') }}" />
            <x-jet-input type="text" class="my-1 block w-full"
                placeholder="{{ __('Rp') }}"
                type-currency="IDR"
                wire:model="harga"
                x-ref="harga" />
            @error('harga') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="hargaRevisian" value="{{ __('Harga Revisian') }}" />
            <x-jet-input type="text" class="my-1 block w-full"
                placeholder="{{ __('Rp') }}"
                x-ref="hargaRevisian"
                wire:model="hargaRevisian" />
                @error('hargaRevisian') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
            </div> --}}
        </div>
        <div class="w-full">
            <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="harga" value="{{ __('Tipe Harga') }}" />
            <x-simple-select-field type="text" class="my-1 block w-full"
                x-ref="tipeharga"
                wire:model="tipeharga">
                <option value="">Select Tipe Harga</option>
                <option value="1">Per Project</option>
                <option value="2">Per Jam</option>
                <option value="3">Per Sesi</option>
                <option value="4">Lainnya</option>
            </x-simple-select-field>
            @error('tipeharga') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="mt-2 flex flex-col mt-4">
            <x-jet-label for="jumlahrevisian" value="{{ __('Jumlah Revisian') }}" />
            <x-simple-select-field type="text" class="my-1 block w-full"
                x-ref="jumlahrevisian"
                wire:model="jumlahrevisian">
                <option value="">Select Jumlah Revisian</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }} Kali</option>
                @endfor
            </x-simple-select-field>
            @error('jumlahrevisian') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    {{-- @if (count($tambahan) < 3)
    <div class="flex justify-end">
        <x-jet-button wire:click="AddTambahan" class="mt-4 justify-end flex bg-green-500 hover:bg-green-600 focus:border-green-300 active:bg-green-900">
            {{ __('Tambahan') }}
        </x-jet-button>
    </div>
    @endif

    @foreach ($tambahan as $index => $item)
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
        <div class="w-full mt-2 flex flex-col mt-4">
        <x-jet-label for="harga" value="{{ __('Nama Tambahan') }}" />
        <x-jet-input type="text" class="my-1 block w-full"
            placeholder="{{ __('Contoh : Langsung Cetak') }}"
            x-ref="harga"
            wire:model="tambahan.{{ $index }}.namatambahan" />
        </div>
        <div class="w-full mt-2 flex flex-col mt-4">
        <x-jet-label for="harga" value="{{ __('Deskripsi') }}" />
        <x-jet-input type="text" class="my-1 block w-full"
            placeholder="{{ __('Deskripsi') }}"
            x-ref="harga"
            wire:model="tambahan.{{ $index }}.deskripsitambahan" />
        </div>

        <div class="w-full mt-2 flex flex-col mt-4">
            <x-jet-label for="harga" value="{{ __('Harga') }}" />
        <div class="grid grid-cols-4 gap-2">
            <div class="col-span-3">
            <x-jet-input type="text" class="my-1 block w-full"
                placeholder="{{ __('Rp') }}"
                x-ref="harga"
                wire:model="tambahan.{{ $index }}.hargatambahan" />
            </div>
            <div>
                <x-delete-button class="my-1 bg-red-500 hover:bg-red-600 focus:border-red-600 active:bg-red-900"
                wire:click="deleteTambahan({{ $index }})" >
                        {{ __('Delete') }}
                </x-delete-button>
            </div>
        </div>
        </div>

    </div>
    @endforeach --}}
</div>
