<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Contract;

class TableOrderDiproses extends Component
{
    public function openProject($id)
    {
        return redirect(url('contracts/' . $id));
    }

    public function render()
    {
        return view('livewire.components.table-order-diproses', [
            'contracts' => Contract::where('seller_id', auth()->user()->id)->where('status', '>', \App\Models\Contract::IS_STARTED)->where('status', '<', \App\Models\Contract::IS_FINISHED)->get(),
        ]);
    }
}
