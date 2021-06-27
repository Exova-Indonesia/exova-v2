<div>
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
         <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin mt-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
         </svg>
      </div>
   </div>
</div>