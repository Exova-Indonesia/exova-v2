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
        $user = User::where('username', $this->username)->first();
        if(!$user) {
            abort(404);
        }
        return view('livewire.studios.show', [
            'user' => $user,
        ]);
    }
}
