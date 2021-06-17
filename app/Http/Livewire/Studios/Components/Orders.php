<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class Orders extends Component
{
    public $type = "order-masuk";
    
    public function loadTable($id) {
        $this->type = $id;
    }
    public function render()
    {
        return view('livewire.studios.components.orders');
    }
}
