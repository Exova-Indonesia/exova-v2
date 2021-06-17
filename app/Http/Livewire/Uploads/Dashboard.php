<?php

namespace App\Http\Livewire\Uploads;

use Livewire\Component;

class Dashboard extends Component
{
    public $namaproject;
    protected $listeners = ["namaproject"];
    
    public function namaproject($e)
    {
        $this->namaproject = $e;
    }
    public function closeModal()
    {
        $this->emit("openModal");
    }
    public function render()
    {
        return view('livewire.uploads.dashboard');
    }
}
