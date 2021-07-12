<div>
    <x-app-layout>
    <x-slot name="header">
         <div class="flex justify-between">
            <div>
               <a href="{{ url('/') }}">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
               </a>
            </div>
            <div>
               <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Jasa') }}
               </h2>
            </div>
         </div>
      </x-slot>
      <div class="overflow-x-hidden">
          <div class="p-10 text-center lg:w-3/5 w-full m-auto">
                   <x-jet-input type="text" class="mt-1 block w-full"
                  placeholder="{{ __('Cari Jasa') }}"
                  x-ref="search"
                  wire:model="search" />
      </div>
      <div class="flex flex-col w-screen min-h-screen p-10 bg-gray-100 text-gray-800">
          <!-- Component Start -->
          <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between mt-6">
              <span class="text-sm font-semibold">1-{{ $product->count() }} of {{ $productAmount }} Products</span>
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
          <!-- Component End  -->
      </div>
      </div>
    </x-app-layout>
</div>
