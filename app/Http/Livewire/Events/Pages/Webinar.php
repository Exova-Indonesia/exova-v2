<?php

namespace App\Http\Livewire\Events\Pages;

use App\Models\Webinar as WB;
use Livewire\Component;

class Webinar extends Component
{
    public $webinar;

    public function render()
    {
        $this->webinar = WB::all();
        return view('livewire.events.pages.webinar');
    }
}
