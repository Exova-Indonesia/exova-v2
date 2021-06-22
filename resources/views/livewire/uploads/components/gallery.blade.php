<div>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
        <div class="w-full lg:col-span-2">
          <x-jet-label for="gambardancover" value="Gambar & Cover" />
          <div class="grid lg:grid-cols-3 grid-cols-1 gap-2 mt-1">
            @livewire('uploads.components.cover-field-uploads')
            @livewire('uploads.components.images-field-uploads')
          </div>
          <div class="mt-12 flex flex-col mt-4">
              <x-jet-label for="urlyoutube" value="{{ __('URL Video Youtube (Optional)') }}" />
              <x-jet-input type="text" class="my-1 block w-full"
                 placeholder="{{ __('URL Video Youtube') }}"
                 x-ref="urlyoutube"
                 wire:model="urlyoutube" />
                 @if(! empty($parsedUrlyoutube))
                 @livewire('uploads.components.youtube-player-preview', ['urls' => $parsedUrlyoutube])
                 @endif
          </div>
      </div>
      @if(! empty($product['cover_id']))
      <div class="mt-2 flex flex-col w-full">
        <x-jet-label for="preview" value="{{ __('Preview') }}" />
        @livewire('components.card-product', ['product'=> $product])
      </div>
      @endif
    </div>
</div>
