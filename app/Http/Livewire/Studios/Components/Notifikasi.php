<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class Notifikasi extends Component
{
    public function render()
    {
        return view('livewire.studios.components.notifikasi', [
            'data' => auth()->user()->notifications,
        ]);
    }
}
