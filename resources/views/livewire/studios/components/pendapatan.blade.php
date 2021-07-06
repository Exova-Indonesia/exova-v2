<div>
         <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
            <x-box-bar wire:click="loadTable('saldo')" class="bg-pink-600">
                <x-slot name="amount">
                    {{ __('Rp' . number_format(auth()->user()->balance, 0, ',', '.')) }}
                </x-slot>
                <x-slot name="title">
                    {{ __('Saldo Total') }}
                </x-slot>
            </x-box-bar>
            <x-box-bar wire:click="loadTable('pendapatan')" class="bg-purple-600">
                <x-slot name="amount">
                    {{ __('Rp' . number_format($revenue->sum('amount'), 0, ',', '.')) }}
                </x-slot>
                <x-slot name="title">
                    {{ __('Pendapatan 30 Hari Terakhir') }}
                </x-slot>
            </x-box-bar>
        </div>
        @if($type == 'pendapatan')
            @livewire('components.table-pendapatan')
        @endif
        @if($type == 'saldo')
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-2 my-8 lg:my-16">
                @livewire('components.card-last-withdraw', ['data' => $data])
                @livewire('components.card-bank-account', ['data' => $data])
            </div>

        @endif
</div>
