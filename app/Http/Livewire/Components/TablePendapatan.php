<?php

namespace App\Http\Livewire\Components;

use App\Models\Revenue;
use Livewire\Component;

class TablePendapatan extends Component
{
    public function render()
    {
        return view('livewire.components.table-pendapatan', [
            'revenue' => Revenue::where('user_id', auth()->user()->id)->get(),
        ]);
    }
}
