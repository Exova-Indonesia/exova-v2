<?php

namespace App\Http\Livewire\Chats\Components;

use App\Models\User;
use Livewire\Component;
use App\Http\Traits\Chat;
use App\Events\MessageSent;
use App\Models\OrderRequest;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadFiles;
use Illuminate\Support\Facades\Validator;

class ChatsBar extends Component
{
    use Chat, WithFileUploads, UploadFiles;
    public $filesName;
    public $picture;
    public $receipent;
    public $msgData;
    public $room_id;
    public $user;
    public $message;
    public $data = [];
    public $fetchMessages = [];

    public function getListeners()
    {
        return [
            "echo-private:chat,MessageSent" => 'newMessage',
            "loadChats" => "loadChats",
        ];
    }

    public function updatedPicture()
    {
        $validator = Validator::make(
            ['picture' => $this->picture],
            ['picture' => 'image|max:5120'],
        );

        if($validator->fails()) {
            $this->removePicture();
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => $validator->errors()->first('picture')]);
        } else {
            $this->filesName = Str::uuid();
            $this->store();
        }
    }

    private function removePicture()
    {
        $this->picture = null;
        $this->reset('picture');
    }

    public function deletePicture()
    {
        $this->removePicture();
    }

    public function mount()
    {
        $this->user = auth()->user()->id;
    }

    public function newMessage($data)
    {
        $this->new($data);
    }

    public function sendMessage($id)
    {
        $this->send($id);
    }

    public function loadChats($id)
    {
        $this->fetchAll($id);
        $user = OrderRequest::where('id', explode('.', $id))->first();
        if($user['seller']['id'] == $this->user) {
            $this->receipent = User::where('id', $user['customer_id'])->first();
        } else {
            $this->receipent = User::where('id', $user['seller_id'])->first();
        }
    }

    public function render()
    {
        return view('livewire.chats.components.chats-bar');
    }
}
