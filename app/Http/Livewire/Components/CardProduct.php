<?php

namespace App\Http\Livewire\Components;

use App\Models\Product;
use Livewire\Component;
use App\Http\Traits\Cart;
use App\Http\Traits\Wishlist;
use App\Models\Wishlist as WS;

class CardProduct extends Component
{
    use Cart, Wishlist;
    public $product;
    public $cart = array();
    protected $listeners = ["updateCardProduct" => 'render'];

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToWish($id)
    {
        $data = WS::where([
            ['user_id', auth()->user()->id],
            ['product_id', $id],
        ])->first();
        $product = Product::where([
            ['id', $id],
            ['seller_id', auth()->user()->id],
        ])->first();
        if(! $product) {
            if(! $data) {
                $this->addWish($id);
            } else {
                $this->removeWish($id);
            }
        } else {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Mana boleh wishlist produk sendiri']);
        }
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
