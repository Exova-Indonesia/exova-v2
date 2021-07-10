<div>
   <div class="flex flex-no-wrap">
    @livewire('studios.components.left-side-bar')
      <!-- Remove class [ h-64 ] when adding a card block -->
      <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">
         <!-- Remove class [ border-dashed border-2 border-gray-300 ] to remove dotted border -->
         <div class="text-3xl mb-4 capitalize font-medium max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $title }}
         </div>
        @if($title == 'dashboard')
            @livewire('studios.components.dashboard')
        @endif
        @if($title == 'notifikasi')
            @livewire('studios.components.notifikasi')
        @endif
        @if($title == 'upload jasa')
            @livewire('studios.components.products')
        @endif
        @if($title == 'kontrak')
            @livewire('studios.components.orders')
        @endif
        @if($title == 'invoices')
            @livewire('studios.components.invoices')
        @endif
        @if($title == 'pendapatan')
            @livewire('studios.components.pendapatan')
        @endif
        @if($title == 'settings')
            @livewire('studios.components.settings')
        @endif
        @if($title == 'achievement')
            @livewire('studios.components.achievement')
        @endif
        @if($title == 'pesan')
            @livewire('studios.components.chats')
        @endif
      </div>
   </div>
</div>