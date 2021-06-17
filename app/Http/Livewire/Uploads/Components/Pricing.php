<?php

namespace App\Http\Livewire\Uploads\Components;

use Livewire\Component;

class Pricing extends Component
{
    public $count = 1;
    public function AddIncrement()
    {
        $this->count = $this->count + 1;
    }
    public function render()
    {
        return view('livewire.uploads.components.pricing');
    }
}
