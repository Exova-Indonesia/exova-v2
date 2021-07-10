<?php

namespace App\Http\Livewire\Studios;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public function next()
    {
        if(! in_array(auth()->user()->role_id, [User::IS_PHOTO, User::IS_VIDEO])) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Kamu harus melengkapi semua kolom terlebih dahulu']);
        } else {
            return redirect(route('studio.dashboard', auth()->user()->username));
        }
    }
    public function render()
    {
        return view('livewire.studios.register');
    }
}
