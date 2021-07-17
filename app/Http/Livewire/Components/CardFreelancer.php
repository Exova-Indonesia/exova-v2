<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class CardFreelancer extends Component
{
    public $item;

    public function mount($data) {
        $this->item = $data;
    }

    public function render()
    {
        return view('livewire.components.card-freelancer');
    }
}
