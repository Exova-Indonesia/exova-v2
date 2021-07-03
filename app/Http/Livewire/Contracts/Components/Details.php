<?php

namespace App\Http\Livewire\Contracts\Components;

use Livewire\Component;

class Details extends Component
{
    public $data;
    public function mount($data)
    {
        $this->data = $data;
    }
    public function render()
    {
        return view('livewire.contracts.components.details');
    }
}
