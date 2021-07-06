<?php

namespace App\Http\Livewire\Components;

use App\Models\Rank;
use Livewire\Component;

class CardRanks extends Component
{
    public $data;

    public function mount($data)
    {
        $this->data = $data;
    }
    public function render()
    {
        return view('livewire.components.card-ranks', [
            'ranks' => Rank::all(),
            'data' => $this->data,
        ]);
    }
}
