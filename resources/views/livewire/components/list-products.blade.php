<div>
              <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mt-6">
                  <span class="text-sm font-semibold">1-{{ $product->count() }} of {{ $productAmount }} Jasa</span>
                  <div class="lg:w-48 w-full">
                  <x-simple-select-field type="text" class="mt-1 block w-full"
                      x-ref="filter"
                      wire:model="filter">
                      <option hidden selected>Sort By</option>
                      <option value="new">Terbaru</option>
                      <option value="price">Termurah</option>
                      <option value="trends">Trends</option>
                      <option value="view">Paling banyak dilihat</option>
                   </x-simple-select-field>
                  </div>
              </div>
              <div class="grid 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-x-6 gap-y-12 w-full mt-6">
                  @forelse ($product as $item)
                  <!-- Product Tile Start -->
                  <livewire:components.card-product :product="$item" :wire:key="$item->id">
                  <!-- Product Tile End -->
                  @empty
                      
                  @endforelse
              </div>
              <div class="flex justify-center mt-10 space-x-1">
                  <x-jet-button type="button" class="mx-1 bg-gray-500 hover:bg-gray-600 focus:border-gray-600 active:bg-gray-900" wire:click="loadMore" wire:loading.attr="disabled">
                     {{ __('Load More') }}
                  </x-jet-button>
              </div>
</div>