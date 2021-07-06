<?php

namespace App\Http\Livewire\Studios;

use App\Models\User;
use Livewire\Component;

class ListFreelancers extends Component
{
    public $data;
    public function render()
    {
        $this->data = User::whereIn('role_id', [User::IS_PHOTO, User::IS_VIDEO])->get();
        return view('livewire.studios.list-freelancers');
    }
}
