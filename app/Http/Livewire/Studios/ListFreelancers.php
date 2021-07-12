<?php

namespace App\Http\Livewire\Studios;

use App\Models\User;
use Livewire\Component;

class ListFreelancers extends Component
{
    public $data;
    public $search = '';

    public function setTawaran($id)
    {
        # code...
    }

    public function render()
    {
        $this->data = User::whereIn('role_id', [User::IS_PHOTO, User::IS_VIDEO])
        ->where('name', 'LIKE', '%' . $this->search . '%')
        ->get();
        return view('livewire.studios.list-freelancers');
    }
}
