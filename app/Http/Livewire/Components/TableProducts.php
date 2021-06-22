<?php

namespace App\Http\Livewire\Components;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

class TableProducts extends Component
{
    public $selectedProducts = [];
    public $dropdown = false;
    public $selectAll = false;
    public $product;

    public function dropDown($id) {
        ($this->dropdown == $id) ? $this->dropdown = false : $this->dropdown = $id;
    }

    public function openModal() {
        try {
            session()->put('products.uuid', uniqid());
            $this->emit("openModal");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editProduct($id) {
        try {
            session()->put('products.uuid', $id);
            $this->emit("openModal");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updatedSelectAll($value) {
        if($value) {
            $this->selectedProducts = Product::where('seller_id', auth()->user()->id)->pluck('id');
        }  else {
            $this->selectedProducts = [];
        }
    }

    public function render()
    {
        $this->product = Product::with('cover.getSmall')->where('seller_id', auth()->user()->id)->get();
        return view('livewire.components.table-products', ['product' => $this->product]);
    }
}
