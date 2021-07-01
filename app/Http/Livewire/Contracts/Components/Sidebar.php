<?php

namespace App\Http\Livewire\Contracts\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public function loadContent($content)
    {
        $this->emitUp('loadContent', $content);
    }
    public function render()
    {
        return view('livewire.contracts.components.sidebar');
    }
}
