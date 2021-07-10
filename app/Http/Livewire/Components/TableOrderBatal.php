<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Contract;

class TableOrderBatal extends Component
{
    public function openProject($id)
    {
        return redirect(url('contracts/' . $id));
    }
    
    public function render()
    {
        return view('livewire.components.table-order-batal', [
            'contract' => Contract::where('seller_id', auth()->user()->id)->where('status', \App\Models\Contract::IS_CANCELED)->get()
        ]);
    }
}
