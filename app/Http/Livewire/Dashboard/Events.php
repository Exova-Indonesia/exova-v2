<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Events extends Component
{

    public function seeWebinar()
    {
        return redirect('event/webinar');
    }

    public function seeKompetisi()
    {
        return redirect('event/competition');
    }

    public function render()
    {
        return view('livewire.dashboard.events');
    }
}
