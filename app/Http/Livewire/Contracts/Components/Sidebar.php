<?php

namespace App\Http\Livewire\Contracts\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $data;
    public function mount($data)
    {
        $this->data = $data;
    }
    public function loadContent($content)
    {
        $this->emitUp('loadContent', $content);
    }
    public function render()
    {
        return view('livewire.contracts.components.sidebar');
    }
}
