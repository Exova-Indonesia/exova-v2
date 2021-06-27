<?php

namespace App\Http\Livewire\Uploads\Components;

use App\Models\Product;
use Livewire\Component;

class Publish extends Component
{
    public $uuid;
    public $product;
    protected $listeners = ["updatePublish"];
    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
        $this->product = Product::where('uuid', $this->uuid)->first();
    }

    public function updatePublish()
    {
        try {
            Product::where('id', $this->product['id'])
            ->update([
                'is_active' => true
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        return view('livewire.uploads.components.publish');
    }
}
