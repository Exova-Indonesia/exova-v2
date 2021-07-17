<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Xpoint;
use Livewire\Component;

class TopFreelancers extends Component
{
    public $data;
    public function render()
    {
        $this->data = Xpoint::get()->unique('user_id');
        // dd($this->data);
        return view('livewire.dashboard.top-freelancers');
    }
}
