<div>
   <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
      <div class="mt-2 flex flex-col w-full lg:col-span-2">
         <x-jet-label for="namaproject" value="{{ __('Nama Project') }}" />
         <x-jet-input type="text" class="mt-1 block w-full"
            placeholder="{{ __('Nama Project') }}"
            x-ref="namaproject"
            wire:model="namaproject" />
            @error('namaproject') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
      </div>
      <div class="mt-2 flex flex-col w-full">
         <x-jet-label for="style" value="{{ __('Style') }}" />
         <x-simple-select-field type="text" class="mt-1 block w-full"
            placeholder="{{ __('Style') }}"
            x-ref="style"
            wire:model="style">
            <option hidden selected>Pilih Style</option>
            @foreach ($allStyles as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
         </x-simple-select-field>
         @error('style') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
      </div>
   </div>
   <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
      <div class="mt-2 flex flex-col w-full lg:col-span-2">
         <x-jet-label for="deskripsi" value="{{ __('Deskripsi') }}" />
         <x-simple-textarea-field type="text" class="mt-1 block w-full"
            rows="5"
            placeholder="{{ __('Deskripsi') }}"
            x-ref="deskripsi"
            maxlength="200"
            wire:model="deskripsi">
         </x-simple-textarea-field>
         @error('deskripsi') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
         <p class="w-full text-right text-xs text-gray-500 pt-1">{{ $strLengthDes }}/200</p>
      </div>
      <div class="mt-2 flex flex-col">
         <div class="flex flex-col w-full">
            <x-jet-label for="kategori" value="{{ __('Kategori') }}" />
            <x-simple-select-field type="text" class="mt-1 block w-full"
               placeholder="{{ __('Kategori') }}"
               x-ref="kategori"
               wire:model="kategori" >
               <option hidden selected>Pilih Kategori</option>
               @foreach ($allCategory as $item)
               <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
               @endforeach
            </x-simple-select-field>
            @error('kategori') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
         </div>
         <div class="mt-2 flex flex-col w-full">
            <x-jet-label for="subkategori" value="{{ __('Sub Kategori') }}" />
            <x-simple-select-field type="text" class="mt-1 block w-full"
               placeholder="{{ __('Sub Kategori') }}"
               x-ref="subkategori"
               wire:model="subkategori" >
               @if(! empty($segmentedSubcategory))
               <option hidden selected>Pilih Sub Kategori</option>
               @foreach ($segmentedSubcategory as $item)
               <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
               @endforeach
               @endif
            </x-simple-select-field>
            @error('subkategori') <span class="error text-sm text-red-600">{{ $message }}</span> @enderror
         </div>
      </div>
   </div>
   {{-- <div class="mt-2 flex flex-col w-full lg:col-span-2">
      <x-jet-label for="tags" value="{{ __('Tags') }}" />
      <x-jet-input type="text" class="mt-1 block w-full"
         placeholder="{{ __('Tags') }}"
         x-ref="tags"
         wire:model="tags" />
   </div> --}}
</div>