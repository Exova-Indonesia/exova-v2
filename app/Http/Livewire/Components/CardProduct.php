<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class CardProduct extends Component
{
    public $product;
    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.components.card-product');
    }
}
