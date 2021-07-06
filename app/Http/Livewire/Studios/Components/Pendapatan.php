<?php

namespace App\Http\Livewire\Studios\Components;

use App\Models\Revenue;
use Livewire\Component;

class Pendapatan extends Component
{
    public $data;
    public $revenue;
    public $type = "saldo";

    protected $listeners = ["reloadData"];
    
    public function loadTable($id) {
        $this->type = $id;
    }
    
    public function reloadData()
    {
        $this->data = auth()->user();
    }

    public function render()
    {
        $this->data = auth()->user();
        $this->revenue = Revenue::where('user_id', $this->data['id'])->whereBetween('created_at', [now()->subDays(30), now()])->get();
        return view('livewire.studios.components.pendapatan');
    }
}
