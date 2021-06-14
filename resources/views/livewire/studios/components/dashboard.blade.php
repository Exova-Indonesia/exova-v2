<div>
         <div class="grid lg:grid-cols-4 grid-cols-2 gap-2">
            <div wire:click="loadTable('order-masuk')" class="cursor-pointer w-full p-4 h-32 rounded-t sm:rounded-l sm:rounded-t-none shadow bg-pink-600 dark:bg-gray-800 transform ease-in-out hover:rotate-2 duration-500">
                <h5 class="mb-2 text-3xl font-bold text-white font-heading">0</h5>
                <h5 class="mb-2 text-md mt-3 text-gray-100 font-heading">Order Masuk</h5>
            </div>
            <div wire:click="loadTable('order-diproses')" class="cursor-pointer w-full p-4 h-32 rounded-t sm:rounded-l sm:rounded-t-none shadow bg-purple-600 dark:bg-gray-800 transform ease-in-out hover:-rotate-2 duration-500">
                <h5 class="mb-2 text-3xl font-bold text-white font-heading">0</h5>
                <h5 class="mb-2 text-md mt-3 text-gray-100 font-heading">Order Diproses</h5>
            </div>
            <div wire:click="loadTable('pendapatan')" class="cursor-pointer w-full p-4 h-32 rounded-t sm:rounded-l sm:rounded-t-none shadow bg-blue-600 dark:bg-gray-800 transform ease-in-out hover:rotate-2 duration-500">
                <h5 class="mb-2 text-3xl font-bold text-white font-heading">0</h5>
                <h5 class="mb-2 text-md mt-3 text-gray-100 font-heading">Pendapatan</h5>
            </div>
            <div wire:click="loadTable('pesan')" class="cursor-pointer w-full p-4 h-32 rounded-t sm:rounded-l sm:rounded-t-none shadow bg-red-600 dark:bg-gray-800 transform ease-in-out hover:-rotate-2 duration-500">
                <h5 class="mb-2 text-3xl font-bold text-white font-heading">0</h5>
                <h5 class="mb-2 text-md mt-3 text-gray-100 font-heading">Pesan</h5>
            </div>
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

</div>
