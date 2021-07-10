<?php

namespace App\Http\Livewire\Notifications;

use Livewire\Component;
use App\Models\Notification;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.notifications.dashboard');
    }
}
