<?php

namespace App\Http\Livewire\Contracts;

use Livewire\Component;
use App\Models\Contract;

class Dashboard extends Component
{
    public $content = 'details';
    public $uuid;
    public $data;
    protected $listeners = ["loadContent", "reloadContract"];

    public function mount($id)
    {
        $this->uuid = $id;
    }

    public function loadContent($content)
    {
        if($content == 'chats') {
            $this->emit('loadChats', $this->data['request_id']);
        }
        $this->content = $content;
    }

    public function reloadContract()
    {
        $this->data = Contract::where('uuid', $this->uuid)->first();
        $this->emit('reloadData');
    }

    public function render()
    {
        $this->data = Contract::where('uuid', $this->uuid)->first();
        if(in_array(auth()->user()->id, [$this->data['seller_id'], $this->data['customer_id']])) {
            return view('livewire.contracts.dashboard');
        } else {
            abort(404);
        }
    }
}
