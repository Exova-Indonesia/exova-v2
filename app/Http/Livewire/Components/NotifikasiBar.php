<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class NotifikasiBar extends Component
{
    public $data;

    public function mount($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.components.notifikasi-bar', [
            'data' => $this->data,
        ]);
    }
}
