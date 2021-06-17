<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class LeftSideBar extends Component
{  
    public function loadContent($title) {
        $this->emit("loadContent", $title);
    }
    public function sidebarHandler()
    {
        $this->dispatchBrowserEvent('sidebarHandler', ['moved' => true]);
    }
    public function render()
    {
        return view('livewire.studios.components.left-side-bar');
    }
}
