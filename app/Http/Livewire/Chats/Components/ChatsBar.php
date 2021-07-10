<?php

namespace App\Http\Livewire\Chats\Components;

use Cache;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Http\Traits\Chat;
use App\Events\MessageSent;
use Illuminate\Support\Str;
use App\Models\OrderRequest;
use App\Http\Traits\Contract;
use App\Http\Traits\Download;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadFiles;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ChatsBar extends Component
{
    use Chat, WithFileUploads, UploadFiles, Download, Contract;
    public $isUpload = false;
    public $detailModal = false;
    public $declineModal = false;
    public $sendTawaranModal = false;
    public $session;
    public $request;
    public $ext;
    public $seller;
    public $size;
    public $old_name;
    public $filesName;
    public $files;
    public $picture;
    public $directory = "messages/attachments";
    public $receipent;
    public $msgData;
    public $room_id;
    public $user;
    public $message;
    public $idFiles;
    public $data = [];
    public $fetchMessages = [];

    public $trollMsg = "Sabar ya, Lagi ngupload bentar aja kok";

    public function getListeners()
    {
        return [
            "echo-private:chat,MessageSent" => 'newMessage',
            "loadChats" => "loadChats",
        ];
    }

    public function gamau()
    {
        $this->trollMsg = "Ih kok gamau lo?, Dibilangin tunggu bentar aja";
    }

    public function yaudah()
    {
        $this->trollMsg = "Nah gitu dong, Bentar aja kok ga lama";
    }

    public function updateRequest()
    {
        $this->emit('updateDbRequest');
        $this->sendTawaranModal = false;
    }

    public function downloadFile($name)
    {
        $this->download($this->directory, $name);
    }

    // public function updatedPicture()
    // {
    //     $this->upPics();
    // }

    // public function updatedFiles()
    // {
    //     $this->upFls();
    // }

    public function approve()
    {
        $this->createContract();
    }

    public function decline()
    {
        $this->declineOrder($this->request['id']);
    }

    public function fetchOrderReq()
    {
        $this->sendTawaranModal = true;
        $this->emit('fetchOrderReq', $this->request);
    }

    
    private function declineOrder($id)
    {
        try {
            OrderRequest::where('id', $id)->update([
                'status' => OrderRequest::IS_DECLINED,
            ]);
            $this->declineModal = false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ruangKontrak($id)
    {
        return redirect(url('contracts/' . $id));
    }

    private function removePicture()
    {
        $this->flsRemove();
    }

    public function deletePicture()
    {
        $this->flsRemove();
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
        if($this->picture) {
            $this->upPics();
        } elseif($this->files) {
            $this->upFls();
        }
        $this->send($id);
        $this->emit('reloadList');
    }

    public function approveContract()
    {
        $this->createContract();
    }

    public function loadChats($id)
    {
        $this->fetchAll($id);
        $user = OrderRequest::where('id', explode('.', $id))->first();
        $this->request = $user;
        if($user['seller']['id'] == $this->user) {
            $this->seller = User::where('id', $user['seller_id'])->first();
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
