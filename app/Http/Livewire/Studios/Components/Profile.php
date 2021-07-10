<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class Profile extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    
    public function render()
    {
        return view('livewire.studios.components.profile');
    }
}
