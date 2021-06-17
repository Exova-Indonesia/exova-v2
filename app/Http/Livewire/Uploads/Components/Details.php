<?php

namespace App\Http\Livewire\Uploads\Components;

use Livewire\Component;

class Details extends Component
{
    public $namaproject;

    public function namaproject()
    {
        $this->emit('namaproject', $this->namaproject);
    }
    public function render()
    {
        return view('livewire.uploads.components.details');
    }
}
