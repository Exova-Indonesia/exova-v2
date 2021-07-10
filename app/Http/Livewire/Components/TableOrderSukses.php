<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Contract;
use App\Http\Traits\Download;

class TableOrderSukses extends Component
{
    use Download;
    public $trollMsg = "Sabar ya, Lagi download bentar aja kok";
    public function downloadFileContract($file)
    {
        return $this->download($file);
    }

    public function openProject($id)
    {
        return redirect(url('contracts/' . $id));
    }

    public function render()
    {
        return view('livewire.components.table-order-sukses', [
            'contract' => Contract::where('seller_id', auth()->user()->id)->where('status', \App\Models\Contract::IS_FINISHED)->get()
        ]);
    }
}
