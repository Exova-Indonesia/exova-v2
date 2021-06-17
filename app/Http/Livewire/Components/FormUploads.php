<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class FormUploads extends Component
{
    public $namaproject;
    
    public function closeModal()
    {
        $this->emit("openModal");
    }
    public function render()
    {
        return view('livewire.components.form-uploads');
    }
}
