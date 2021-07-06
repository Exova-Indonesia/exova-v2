<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class CardLastWithdraw extends Component
{
    public $data;
    
    public function mount($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.components.card-last-withdraw');
    }
}
