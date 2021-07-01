<?php

namespace App\Http\Livewire\Chats;

use Livewire\Component;
use App\Models\OrderRequest;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.chats.dashboard');
    }
}
