<div x-data="{ isUploading: false, progress: 0 }" 
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false" 
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress">
  <div class="border h-24 items-center min-h-full rounded-lg max-h-full">
      @if(isset($product['images'][1]))
        <img class="w-full h-full object-cover rounded-lg" src="{{ $product['images'][1]['getSmall']['path'] }}" alt="">
        <x-delete-button wire:loading.attr="disabled" wire:target="deletePicture('{{ $product['images'][1]['id'] }}')" wire:click="deletePicture('{{ $product['images'][1]['id'] }}')" class="h-8 w-8 bg-red-500 hover:bg-red-600 mt-1 flex items-start justify-start" />    
      @else
      <x-jet-label for="pictures" class="h-24 flex items-center min-h-full max-h-full justify-center w-full">
        Gambar
      </x-jet-label>
      <x-jet-input type="file" class="mt-1 hidden w-full"
         x-ref="pictures"
         id="pictures"
         wire:model="pictures"
         />
      @endif
      <div wire:loading wire:target="pictures">
         <progress max="100" x-bind:value="progress"></progress>
      </div>
   </div>
</div>