<?php

namespace App\Http\Livewire\Chats\Components;

use App\Models\Message;
use Livewire\Component;
use App\Http\Traits\Chat;
use App\Models\OrderRequest;

class CardChatsList extends Component
{
    use Chat;
    public $search;
    public $message;
    public $user;
    public $data;
    public $room_id;
    public $room = [];

    protected $listeners = ["reloadList" => 'render'];

    public function mount()
    {
        $this->user = auth()->user()->id;
    }

    public function loadChats($id)
    {
        session()->put('chat.room', $id);
        $this->emit('loadChats', $id);
        // $this->dispatchBrowserEvent('chat:scroll');
    }

    public function render()
    {
        $this->fetchContacts($this->user, $this->search);
        $this->message = new Message;
        return view('livewire.chats.components.card-chats-list');
    }
}
