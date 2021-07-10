<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Contract;
use App\Models\OrderRequest;

class TableOrderMasuk extends Component
{
    public $data;

    public function openProject()
    {
        return redirect(url('chats'));
    }

    public function render()
    {
        return view('livewire.components.table-order-masuk', [
            'orders' => OrderRequest::where('seller_id', auth()->user()->id)->get(),
            'contracts' => Contract::where('seller_id', auth()->user()->id)->get(),
        ]);
    }
}
