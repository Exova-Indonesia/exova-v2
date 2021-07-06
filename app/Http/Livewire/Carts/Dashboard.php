<?php

namespace App\Http\Livewire\Carts;

use Livewire\Component;
use App\Http\Traits\Cart;
use App\Http\Traits\CreateOrderRequests;

class Dashboard extends Component
{
    use Cart, CreateOrderRequests;
    public $dataCart;
    public $cartDetail;
    public $subtotal = 0;
    public $meetSeller;
    public $selectedProduct;
    public $isSelectedProduct = false;
    public $isSaved = false;
    
    protected $listeners = ["updateCart"];

    public function deleteCart($id)
    {
        $this->delete($id);
        if($this->cartDetail['id'] == $id) {
            $this->isSelectedProduct = false;
        }
    }

    public function negoAndnext()
    {
        foreach ($this->dataCart as $key => $value) {
            $this->createRequest($value);
        }
    }

    public function saveDetails($id)
    {
        $this->isSaved = true;
        $this->emit('saveToSession', $id);
    }

    public function updateCart()
    {
        $this->dataCart = $this->get();
        $this->subtotal = 0;
        if(! empty($this->dataCart)) {
            foreach ($this->dataCart as $key => $value) {
                $this->subtotal += $value['price'];
            }
        }
    }

    public function selectProduct($id)
    {
        $this->isSelectedProduct = true;
        $this->cartDetail = $this->dataCart[$id];
        $this->emit('selectProduct', $this->cartDetail);
    }

    public function render()
    {
        $this->updateCart();
        return view('livewire.carts.dashboard');
    }
}
