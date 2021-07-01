<?php 
namespace App\Http\Traits;

use App\Events\MessageSent;
use App\Models\OrderRequest;

/**
 * 
 */
trait Chat {
    public function fetchAll($room_id) {
        $this->fetchMessages = [];
        $this->msgData = json_decode(file_get_contents('js/messages.json'), true);
        foreach ($this->msgData as $key => $data) {
            if($room_id == $data['room_id']) {
                $this->fetchMessages[] = [
                    "id" => $data['id'],
                    "room_id" => $data['room_id'],
                    "from_id" => $data['from_id'],
                    "to_id" => $data['to_id'],
                    "messages" => $data['messages'],
                    "attachments" => $data['attachments'],
                    "created_at" => $data['created_at'],
                    "updated_at" => $data['updated_at'],
                ];
            }
        }
    }
    public function new($data) {
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

    public function send($id) {
        $this->data = [
            "id" => rand(),
            "room_id" => (int) session()->get('chat.room'),
            "from_id" => $this->user,
            "to_id" => $id,
            "messages" => $this->message,
            "attachments" => $this->filesName,
            "created_at" => now(),
            "updated_at" => now(),
        ];
        $tmpMsg = file_get_contents('js/messages.json');
        $tempArray = json_decode($tmpMsg);
        array_push($tempArray, $this->data);
        $jsonData = json_encode($tempArray);
        file_put_contents('js/messages.json', $jsonData);
        $this->reset('message');
        broadcast(new MessageSent($this->user, $this->data));
    }

    public function fetchContacts($id) {
        $this->data = OrderRequest::with('customer', 'seller')->where('seller_id', $id)->orWhere('customer_id', $id)->get();
        $this->room = $this->data;
    }
}

?>