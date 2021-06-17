<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class Pendapatan extends Component
{
    public $type = "saldo";
    
    public function loadTable($id) {
        $this->type = $id;
    }
    public function render()
    {
        return view('livewire.studios.components.pendapatan');
    }
}
