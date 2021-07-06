<div>
   <x-app-layout>
      <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wishlist') }}
         </h2>
      </x-slot>
      <div>
         <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="overflow-x-hidden">
               <div class="flex flex-col w-screen min-h-screen p-10 bg-gray-100 text-gray-800">
                  <div class="grid 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-x-6 gap-y-12 w-full mt-6">
                     @forelse ($product as $item)
                     <!-- Product Tile Start -->
                     <livewire:components.card-product :product="$item['product']" :wire:key="$item->id">
                     <!-- Product Tile End -->
                     @empty
                     @endforelse
                  </div>
                  <!-- Component End  -->
               </div>
            </div>
         </div>
      </div>
   </x-app-layout>
</div>