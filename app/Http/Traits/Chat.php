<?php 
namespace App\Http\Traits;

use App\Models\Message;
use App\Events\MessageSent;
use App\Models\OrderRequest;
use Illuminate\Support\Facades\Validator;

/**
 * 
 */
trait Chat {
    public function fetchAll($room_id) {
        try {
            $this->fetchMessages = [];
            $this->fetchMessages = Message::where('room_id', $room_id)->get();
            $this->fetchMessages = json_decode($this->fetchMessages, true);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Terjadi kesalahan']);
        }
    }
    public function new($data) {
        try {
            if((int) session()->get('chat.room') == $data['message']['room_id']) {
                $this->fetchMessages[] = [
                    "id" => $data['message']['id'],
                    "room_id" => $data['message']['room_id'],
                    "from_id" => $data['message']['from_id'],
                    "to_id" => $data['message']['to_id'],
                    "messages" => $data['message']['messages'],
                    "attachments" => $data['message']['attachments'],
                    "created_at" => $data['message']['created_at'],
                    "updated_at" => $data['message']['updated_at'],
                ];
            }
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Terjadi kesalahan']);
        }
    }

    public function send($id) {
        try {
            $attachments = [ 
                "id" => $this->idFiles['id'] ?? null,
                "path" => $this->idFiles['path'] ?? null,
                "type" => $this->idFiles['type'] ?? null,
                "old_name" => $this->idFiles['old_name'] ?? null,
                "new_name" => $this->idFiles['new_name'] ?? null,
            ];
            $this->data = [
                "id" => rand(),
                "room_id" => (int) session()->get('chat.room'),
                "from_id" => $this->user,
                "to_id" => $id,
                "messages" => $this->message,
                "attachments" => json_encode($attachments),
            ];
            $msg = Message::create($this->data);
            broadcast(new MessageSent($this->user, $msg))->toOthers();
            OrderRequest::where('id', (int) session()->get('chat.room'))
            ->update([
                "last_message_id" => $msg->id,
            ]);
            $this->reset('message');
            if(isset($this->picture) || isset($this->files)) {
                $this->flsRemove();
            }
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Terjadi kesalahan']);
        }
    }

    public function fetchContacts($id, $search = null) {
        try {
            $this->data = OrderRequest::with(['seller' => function($q) use ($search) {
                return $q->where('name', 'LIKE', '%' . $search . '%');
            }, 'customer' => function($q) use ($search) {
                return $q->where('name', 'LIKE', '%' . $search . '%');
            }])
            ->where('seller_id', $id)
            ->orWhere('customer_id', $id)
            ->orderby('updated_at', 'DESC')
            ->get();
            $this->room = $this->data;
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Terjadi kesalahan']);
        }
    }

    public function flsRemove()
    {
        $this->picture = null;
        $this->reset('picture');
        $this->files = null;
        $this->reset('files');
    }
}

?>