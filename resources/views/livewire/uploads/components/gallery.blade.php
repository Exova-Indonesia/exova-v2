<div>
    <div class="grid lg:grid-cols-3 grid-cols-1 gap-2">
        <div class="w-full lg:col-span-2">
          <x-jet-label for="gambardancover" value="Gambar & Cover" />
          <div class="grid lg:grid-cols-3 grid-cols-1 gap-2 mt-1">
            @for ($i = 0; $i < 3; $i++)
                <div class="border h-24 flex items-center min-h-full max-h-full">
                      @if($pictures)
                        <img class="w-full h-full object-cover rounded-lg" src="{{ $pictures->temporaryUrl() }}" alt="">
                      @else
                        <x-jet-label for="pictures" class="h-24 flex items-center min-h-full max-h-full justify-center w-full">
                            Upload
                        </x-jet-label>
                        <x-jet-input type="file" class="mt-1 hidden w-full"
                        x-ref="pictures"
                        id="pictures"
                        wire:model="pictures" />
                        @endif
                      </div>
                        @endfor
                  </div>
          <div class="mt-2 flex flex-col mt-4">
              <x-jet-label for="urlyoutube" value="{{ __('URL Video Youtube (Optional)') }}" />
              <x-jet-input type="text" class="my-1 block w-full"
                 placeholder="{{ __('URL Video Youtube') }}"
                 x-ref="urlyoutube"
                 wire:model="urlyoutube"
                 wire:change="urlyoutube" />
                 <div class="mt-4" id="player" data-plyr-provider="youtube" ratio="2:1" data-plyr-embed-id="a-cDkMSJJjk"></div>
          </div>
      </div>
      <div class="mt-2 flex flex-col w-full">
        <x-jet-label for="preview" value="{{ __('Preview') }}" />
        @livewire('components.card-product')
      </div>
    </div>
    <script>
      const player = new Plyr('#player', {
        ratio : "16:9"
      });
    </script>
</div>
