<div>
   <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
      <div class="mt-2 flex flex-col w-full lg:col-span-2">
         <x-jet-label for="namaproject" value="{{ __('Nama Project') }}" />
         <x-jet-input type="text" class="mt-1 block w-full"
            placeholder="{{ __('Nama Project') }}"
            x-ref="namaproject"
            wire:model="namaproject" />
      </div>
      <div class="mt-2 flex flex-col w-full">
         <x-jet-label for="style" value="{{ __('Style') }}" />
         <x-simple-select-field type="text" class="mt-1 block w-full"
            placeholder="{{ __('Style') }}"
            x-ref="style"
            wire:model="style">
            <option hidden selected>Select SubCategory</option>
            <option value="1">Balinese</option>
            <option value="2">Javanese</option>
         </x-simple-select-field>
      </div>
   </div>
   <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
      <div class="mt-2 flex flex-col w-full lg:col-span-2">
         <x-jet-label for="deskripsi" value="{{ __('Deskripsi') }}" />
         <x-simple-textarea-field type="text" class="mt-1 block w-full"
            rows="5"
            placeholder="{{ __('Deskripsi') }}"
            x-ref="deskripsi"
            wire:model="deskripsi">
         </x-simple-textarea-field>
         <p class="w-full text-right text-xs text-gray-500 pt-1">Character Limit: 200</p>
      </div>
      <div class="mt-2 flex flex-col">
         <div class="flex flex-col w-full">
            <x-jet-label for="kategori" value="{{ __('Kategori') }}" />
            <x-simple-select-field type="text" class="mt-1 block w-full"
               placeholder="{{ __('Kategori') }}"
               x-ref="kategori"
               wire:model="kategori" >
               <option hidden selected>Select Category</option>
               <option value="1">Photography</option>
            </x-simple-select-field>
         </div>
         <div class="mt-2 flex flex-col w-full">
            <x-jet-label for="subkategori" value="{{ __('Sub Kategori') }}" />
            <x-simple-select-field type="text" class="mt-1 block w-full"
               placeholder="{{ __('Sub Kategori') }}"
               x-ref="subkategori"
               wire:model="subkategori" >
               <option hidden selected>Select SubCategory</option>
               <option value="1">Prawedding</option>
            </x-simple-select-field>
         </div>
      </div>
   </div>
   <div class="mt-2 flex flex-col w-full lg:col-span-2">
      <x-jet-label for="tags" value="{{ __('Tags') }}" />
      <x-jet-input type="text" class="mt-1 block w-full"
         placeholder="{{ __('Tags') }}"
         x-ref="tags"
         wire:model="tags" />
   </div>
</div>