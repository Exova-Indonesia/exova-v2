<?php

namespace App\Http\Livewire\Events\Components;

use Livewire\Component;

class Topnav extends Component
{
    public $mobileMenu = false;

    public function render()
    {
        return view('livewire.events.components.topnav');
    }
}
