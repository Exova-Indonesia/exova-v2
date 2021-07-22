
<di x-data="{ isUploading: false, progress: 0 }" 
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false" 
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress">
  <div class="border h-24 items-center min-h-full rounded-lg max-h-full" >
      @if(! empty($product['cover_id']))
      <img class="w-full h-full object-cover rounded-lg" src="{{ $product['cover']['getSmall']['path'] }}" alt="">
      <x-delete-button wire:loading.attr="disabled" wire:target="deleteCover('{{ $product['cover_id'] }}')" wire:click="deleteCover('{{ $product['cover_id'] }}')" class="h-8 w-8 bg-red-500 hover:bg-red-600 mt-1 flex items-start justify-start" />
      @else
      <x-jet-label for="cover" class="h-24 flex items-center min-h-full max-h-full justify-center w-full">
        Cover
      </x-jet-label>
      <x-jet-input type="file" class="mt-1 hidden w-full"
         x-ref="cover"
         id="cover"
         wire:model="cover"
         />
      @endif
      <div wire:loading wire:target="cover">
         <progress max="100" x-bind:value="progress"></progress>
      </div>
   </div>
</di>