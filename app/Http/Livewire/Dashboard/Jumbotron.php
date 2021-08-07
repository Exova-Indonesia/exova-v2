<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Jumbotron extends Component
{
    public $adsModal = false;

    public function gotoAds()
    {
        return redirect('event/competition');
    }

    public function render()
    {
        return view('livewire.dashboard.jumbotron');
    }
}
