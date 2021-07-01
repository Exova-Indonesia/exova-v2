<?php

namespace App\Http\Livewire\Contracts;

use Livewire\Component;

class Dashboard extends Component
{
    public $content = 'details';
    protected $listeners = ["loadContent"];

    public function loadContent($content)
    {
        $this->content = $content;
    }
    public function render()
    {
        return view('livewire.contracts.dashboard');
    }
}
