<div>
         <div class="grid lg:grid-cols-4 grid-cols-2 gap-2">
            <x-box-bar wire:click="loadTable('order-masuk')" class="bg-pink-600">
                <x-slot name="amount">
                    {{ __('0') }}
                </x-slot>
                <x-slot name="title">
                    {{ __('Order Masuk') }}
                </x-slot>
            </x-box-bar>
            <x-box-bar wire:click="loadTable('order-diproses')" class="bg-purple-600">
                <x-slot name="amount">
                    {{ __('0') }}
                </x-slot>
                <x-slot name="title">
                    {{ __('Order Diproses') }}
                </x-slot>
            </x-box-bar>
            <x-box-bar wire:click="loadTable('pendapatan')" class="bg-blue-600">
                <x-slot name="amount">
                    {{ __('0') }}
                </x-slot>
                <x-slot name="title">
                    {{ __('Pendapatan') }}
                </x-slot>
            </x-box-bar>
            <x-box-bar wire:click="loadTable('order-sukses')" class="bg-red-600">
                <x-slot name="amount">
                    {{ __('0') }}
                </x-slot>
                <x-slot name="title">
                    {{ __('Order Sukses') }}
                </x-slot>
            </x-box-bar>
        </div>    
        @if($type == 'order-masuk')
            @livewire('components.table-order-masuk')
        @endif
        @if($type == 'order-diproses')
            @livewire('components.table-order-diproses')
        @endif
        @if($type == 'pendapatan')
            @livewire('components.table-pendapatan')
        @endif
        @if($type == 'order-sukses')
            @livewire('components.table-order-sukses')
        @endif

</div>
