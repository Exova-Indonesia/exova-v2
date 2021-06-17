<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class Invoices extends Component
{
    public $dropdown = false;
    
    public function dropDown() {
        ($this->dropdown) ? $this->dropdown = false : $this->dropdown = true;
    }
    public function render()
    {
        return view('livewire.studios.components.invoices');
    }
}
