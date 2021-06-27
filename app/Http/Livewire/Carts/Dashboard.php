<?php

namespace App\Http\Livewire\Carts;

use Livewire\Component;
use App\Http\Traits\Cart;

class Dashboard extends Component
{
    use Cart;
    public $dataCart;
    public $subtotal = 0;
    public $meetSeller;
    
    public function deleteCart($id)
    {
        $this->delete($id);
    }

    public function render()
    {
        $this->dataCart = $this->get();
        $this->subtotal = 0;
        foreach ($this->dataCart as $key => $value) {
            $this->subtotal += $value['price'];
        }
        return view('livewire.carts.dashboard');
    }
}
