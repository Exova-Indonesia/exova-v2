<?php

namespace App\Http\Livewire\Studios\Components;

use App\Models\Revenue;
use Livewire\Component;
use App\Models\Contract;
use App\Models\OrderRequest;

class Dashboard extends Component
{
    public $type = "order-masuk";
    
    public function loadTable($id) {
        $this->type = $id;
    }
    public function render()
    {
        return view('livewire.studios.components.dashboard', [
            'orders' => OrderRequest::where('seller_id', auth()->user()->id)->get(),
            'contracts' => Contract::where('seller_id', auth()->user()->id)->get(),
            'revenue' => Revenue::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
