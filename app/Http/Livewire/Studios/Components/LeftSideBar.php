<?php

namespace App\Http\Livewire\Studios\Components;

use App\Models\Message;
use App\Models\Product;
use Livewire\Component;
use App\Models\Contract;

class LeftSideBar extends Component
{  
    public $title = "dashboard";
    public $userid;

    public function mount()
    {
        $this->userid = auth()->user()->id;
    }

    public function loadContent($title) {
        $this->emit("loadContent", $title);
        $this->title = $title;
    }
    public function sidebarHandler()
    {
        $this->dispatchBrowserEvent('sidebarHandler', ['moved' => true]);
    }
    public function render()
    {
        return view('livewire.studios.components.left-side-bar', [
            'messages' => Message::where('from_id', $this->userid)
            ->orWhere('to_id', $this->userid)->count(),
            'products' => Product::where('seller_id', $this->userid)->count(),
            'contracts' => Contract::where('seller_id', $this->userid)->count(),
        ]);
    }
}
