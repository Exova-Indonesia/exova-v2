<?php

namespace App\Http\Livewire\Contracts\Components;

use App\Models\Message;
use Livewire\Component;
use App\Http\Traits\Download;

class Files extends Component
{
    use Download;
    
    public $data;
    public $message;
    public function mount($data)
    {
        $this->data = $data;
        $this->message = Message::where('room_id', $this->data['requests']['id'])->get();
    }

    public function downloadAssetChat($file)
    {
        return $this->download($file);
    }

    public function render()
    {
        return view('livewire.contracts.components.files');
    }
}
