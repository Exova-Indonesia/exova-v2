<div>
   {{-- <x-app-layout> --}}
      <x-slot name="navbar">
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
                  {{ __('Wishlist') }}
               </h2>
            </div>
         </div>
      </x-slot>
      <div>
         <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="overflow-x-hidden">
               <div class="flex flex-col w-full min-h-screen p-10 bg-gray-100 text-gray-800">
                  @if(! empty($product))
                  <div class="grid 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-x-6 gap-y-12 w-full mt-6">
                     @forelse ($product as $item)
                     @if(! empty($item['product']))
                     <!-- Product Tile Start -->
                     <livewire:components.card-product :product="$item['product']" :wire:key="$item->id">
                     <!-- Product Tile End -->
                     @endif
                     @empty
                     {{--  --}}
                     @endforelse
                  </div>
                  @else
                  <div class="flex flex-col">
                     <div class="m-auto">
                        <img src="{{ Storage::disk('s3')->url('icons/emtproduct.svg') }}" alt="">
                     </div>
                     <div>
                        <p class="py-2 text-center">Sepertinya kamu belum memiliki wishlist</p>
                     </div>
                  </div>
                  @endif
                  <!-- Component End  -->
               </div>
            </div>
         </div>
      </div>
   {{-- </x-app-layout> --}}
</div>