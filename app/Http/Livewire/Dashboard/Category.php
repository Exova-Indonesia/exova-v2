<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SubCategory;

class Category extends Component
{
    public function render()
    {
        return view('livewire.dashboard.category', [
            'category' => SubCategory::all(),
        ]);
    }
}
