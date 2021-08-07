<?php

namespace App\Http\Livewire\Events\Pages;

use Livewire\Component;
use App\Models\Competition as Comp;

class Competition extends Component
{
    public function render()
    {
        return view('livewire.events.pages.competition', [
            'competition' => Comp::all(),
        ]);
    }
}
