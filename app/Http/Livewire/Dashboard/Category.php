<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Category as CT;

class Category extends Component
{
    public function render()
    {
        return view('livewire.dashboard.category', [
            'category' => CT::all(),
        ]);
    }
}
