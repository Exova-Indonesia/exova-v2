<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Http\Traits\Cart;

class CardProduct extends Component
{
    use Cart;
    public $product;
    public $cart = array();
    protected $listeners = ["updateCardProduct" => 'render'];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart($id)
    {
        $this->add($id);
    }

    public function render()
    {
        return view('livewire.components.card-product', ['product' => $this->product]);
    }
}
