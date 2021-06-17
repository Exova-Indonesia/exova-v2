<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class TableProducts extends Component
{
    public $selectedProducts = [];
    public $openModal = false;
    public $dropdown = false;
    public $selectAll = false;
    public $listeners = ["openModal"];
    
    public function dropDown() {
        ($this->dropdown) ? $this->dropdown = false : $this->dropdown = true;
    }
    public function openModal() {
        ($this->openModal) ? $this->openModal = false : $this->openModal = true;
        $this->dispatchBrowserEvent('event:modal', ['status' => $this->openModal]);
    }
    public function updateSelectAll($value) {
        if($value) {
            $selectedProducts = ["1", "2"];
        }  else {
            $selectedProducts = [];
        }
    }
    public function render()
    {
        return view('livewire.components.table-products');
    }
}
