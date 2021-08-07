<?php

namespace App\Http\Livewire\Studios;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    protected $queryString = ['com'];
    public $com;

    public function next()
    {
        if(! in_array(auth()->user()->role_id, [User::IS_PHOTO, User::IS_VIDEO])) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Kamu harus melengkapi semua kolom terlebih dahulu']);
        } else {
            if($this->com) {
                return redirect(route('competition.dashboard'));
            } else {
                return redirect(route('studio.dashboard', auth()->user()->username));
            }
        }
    }
    public function render()
    {
        return view('livewire.studios.register');
    }
}
