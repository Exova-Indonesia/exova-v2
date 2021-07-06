<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class Achievement extends Component
{
    public $data;
    
    public function render()
    {
        $this->data = auth()->user();
        return view('livewire.studios.components.achievement');
    }
}
