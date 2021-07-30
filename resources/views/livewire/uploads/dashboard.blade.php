<div>
   <div class="p-8 md:p-16">
      <div class="flex justify-between">
         <div>
            <x-jet-button type="button" class="mx-1 bg-pink-500 hover:bg-pink-600 focus:border-pink-600 active:bg-pink-900" wire:click="saveAsDraf" wire:loading.attr="disabled" wire:target="files">
               {{ __('Draf') }}
            </x-jet-button>
         </div>
         <div>
            <x-jet-button type="button" class="mx-1 bg-blue-500 hover:bg-blue-600 focus:border-blue-600 active:bg-blue-900" wire:click="publish" wire:loading.attr="disabled" wire:target="files">
               {{ __('Publikasikan') }}
            </x-jet-button>
         </div>
      </div>
      {{-- Content --}}
      <div class="py-8 grid grid-cols-1 md:grid-cols-4 md:gap-8">
         <div>
            <h2 class="text-center font-medium text-lg">Media</h2>
            @if(count($product['images']) < 3)
            <div>
               <x-file-pond-contract wire:model="files"
               allowFileTypeValidation
               allowFileSizeValidation
               allowMultiple
               maxFiles="{{ 3 - count($product['images']) }}"
               maxFileSize="25mb" />
            </div>
            @endif
            @forelse ($product['images'] as $item)
            <div class="p-2">
               <div class="absolute flex justify-between">
                  <x-delete-button wire:loading.attr="disabled" wire:target="deletePicture({{ $item['id'] }})" wire:click="deletePicture({{ $item['id'] }})" class="h-8 w-8 bg-red-500 hover:bg-red-600 flex items-start justify-start" />
                  @if($item['id'] == $product['cover_id'])
                  <span class="bg-pink-500 py-1 px-2 ml-2 rounded-full text-white">Cover</span>
                  @else 
                  <span wire:click="Cover({{ $item['id'] }})" class="cursor-pointer bg-pink-500 py-1 px-2 ml-2 rounded-full text-white">Set Cover</span>
                  @endif
               </div>
               <img class="w-full h-48 object-cover rounded-md" src="{{ $item['getLarge']['path'] }}" alt="">
            </div>
            @empty
               <p class="text-center py-16">Silakan upload foto</p>
            @endforelse

         </div>
         <div class="col-span-2">
            <h2 class="text-center font-medium text-lg">Detail</h2>
            <!-- Project name -->
            <div class="col-span-6 sm:col-span-4 my-2">
               <x-jet-label for="name" value="{{ __('Nama Project') }}" />
               <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.lazy="name" autocomplete="name" />
               <x-jet-input-error for="name" class="mt-2" />
            </div>
            {{-- Category - Style --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-1">
               {{-- Category --}}
               <div class="my-2">
                  <x-jet-label for="kategori" value="{{ __('Kategori') }}" />
                  <x-simple-select-field type="text" class="mt-1 block w-full"
                  id="kategori"
                  wire:model="kategori">
                     <option hidden selected>Pilih Kategori</option>
                     @foreach ($allCategory as $item)
                     <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                     @endforeach
                  </x-simple-select-field>
                  <x-jet-input-error for="kategori" class="mt-2" />
               </div>
               {{-- Subcategory --}}
               <div class="my-2">
                  <x-jet-label for="subkategori" value="{{ __('Sub Kategori') }}" />
                  <x-simple-select-field type="text" class="mt-1 block w-full"
                  id="subkategori"
                  wire:model.lazy="subkategori">
                     @if(count($segmentedSubcategory) > 0)
                     <option hidden selected>Pilih SubKategori</option>
                     @endif
                     @foreach ($segmentedSubcategory as $item)
                     <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                     @endforeach
                  </x-simple-select-field>
                  <x-jet-input-error for="subkategori" class="mt-2" />
               </div>
               {{-- Style --}}
               <div class="my-2">
                  <x-jet-label for="style" value="{{ __('Style') }}" />
                  <x-simple-select-field type="text" class="mt-1 block w-full"
                  id="style"
                  wire:model.lazy="style">
                     <option hidden selected>Pilih Style</option>
                     @foreach ($allStyles as $item)
                     <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                     @endforeach
                  </x-simple-select-field>
                  <x-jet-input-error for="style" class="mt-2" />
               </div>
            </div>
            {{-- Pricing --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
               {{-- Price --}}
               <div class="my-2">
                  <x-jet-label for="harga" value="{{ __('Harga') }}" />
                  <x-jet-input type="text" class="mt-1 block w-full" wire:model="harga" autocomplete="name" />
                  <x-jet-input-error for="harga" class="mt-2" />
               </div>
               {{-- Type price --}}
               <div class="my-2">
                  <x-jet-label for="roles" value="{{ __('Tipe Harga') }}" />
                  <x-simple-select-field type="text" class="mt-1 block w-full"
                  id="tipeharga"
                  wire:model.lazy="tipeharga">
                     <option value="">Pilih Tipe Harga</option>
                     <option value="1">Per Project</option>
                     <option value="2">Per Jam</option>
                     <option value="3">Per Sesi</option>
                     <option value="4">Lainnya</option>
                  </x-simple-select-field>
                  <x-jet-input-error for="tipeharga" class="mt-2" />
               </div>
            </div>
            <!-- Description -->
            <div class="col-span-6 sm:col-span-4">
                  <x-jet-label for="deskripsi" value="{{ __('Deskripsi') }}" />
                  <x-simple-textarea-field type="text" class="mt-1 block w-full"
                     rows="5"
                     id="deskripsi"
                     maxlength="200"
                     wire:model.lazy="deskripsi">
                  </x-simple-textarea-field>
                  <x-jet-input-error for="deskripsi" class="mt-2" />
            </div>
         </div>
         <div>
            <h2 class="text-center font-medium text-lg">Preview</h2>
            @if(! empty($product['cover_id']))
               <livewire:components.card-product :product="$product" :wire:key="$product->id">
            @else
               <p class="text-center py-16">Silakan set cover terlebih dahulu</p>
            @endif
         </div>
      </div>
   </div>
</div>
