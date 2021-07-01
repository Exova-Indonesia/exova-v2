<?php

namespace App\Http\Livewire\Chats\Components;

use Livewire\Component;
use App\Http\Traits\Chat;
use App\Models\OrderRequest;

class CardChatsList extends Component
{
    use Chat;
    public $user;
    public $data;
    public $room_id;
    public $room = [];

    public function mount()
    {
        $this->user = auth()->user()->id;
        $this->fetchContacts($this->user);

    }

    public function loadChats($id)
    {
        session()->put('chat.room', $id);
        $this->emit('loadChats', $id);
    }

    public function render()
    {
        return view('livewire.chats.components.card-chats-list');
    }
}
