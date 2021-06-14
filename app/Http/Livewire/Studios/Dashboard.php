<?php

namespace App\Http\Livewire\Studios;

use Livewire\Component;

class Dashboard extends Component
{
    public $title = "dashboard";
    
    public function loadContent($title) {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.studios.dashboard');
    }
}
