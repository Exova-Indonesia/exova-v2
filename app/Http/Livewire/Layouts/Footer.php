<?php

namespace App\Http\Livewire\Layouts;

use App\Models\User;
use Livewire\Component;

class Footer extends Component
{
    protected $listeners = ["addDeviceToken"];
    
    public function addDeviceToken($id)
    {
        if(auth()->check()) {
            User::where('id', auth()->user()->id)->update([
                'device_token' => $id,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.layouts.footer');
    }
}
