<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;
use Illuminate\Support\Str;

class Products extends Component
{
    public $openModal = false;

    public $listeners = ["closeModal", "openModal"];

    public function closeModal()
    {
        $this->openModal = false;
        $this->dispatchBrowserEvent('event:modal', ['status' => $this->openModal]);
    }

    public function openModal()
    {
        $this->openModal = true;
        $this->dispatchBrowserEvent('event:modal', ['status' => $this->openModal]);
    }
    public function render()
    {
        return view('livewire.studios.components.products');
    }
}
