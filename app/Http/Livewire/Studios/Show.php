<?php

namespace App\Http\Livewire\Studios;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $username;
    public function mount($id)
    {
        $this->username = $id;
    }

    public function render()
    {
        return view('livewire.studios.show', [
            'user' => User::where('username', $this->username)->first(),
        ]);
    }
}
