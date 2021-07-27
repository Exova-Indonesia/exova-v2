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

    public function redirectToUpload() {
        try {
            $uuid = uniqid();
            Product::create([
                'uuid' => $uuid,
                'seller_id' => auth()->user()->id,
                'is_active' => false,
            ]);
            return redirect(url('studio/uploads/' . $uuid));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editProduct($id) {
        try {
            return redirect(url('studio/uploads/' . $id));
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

    public function deleteProduct()
    {
        try {
            Product::whereIn('id', $this->selectedProducts)->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        $this->product = Product::with('cover.getSmall')->where('seller_id', auth()->user()->id)->get();
        return view('livewire.components.table-products', ['product' => $this->product]);
    }
}
