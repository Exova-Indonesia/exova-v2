<?php

namespace App\Http\Livewire\Uploads\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadPictures;

class Images1FieldUploads extends Component
{
    use WithFileUploads, UploadPictures;

    public $pictures;
    public $uuid;
    public $product;

    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
    }
    
    public function updatedPictures()
    {
        $this->updatePictures($this->pictures, 'pictures');
    }

    public function deletePicture($id)
    {
        $this->deletePictures($id);
    }
    public function render()
    {
        $this->product = Product::where('uuid', $this->uuid)->first();
        $this->product = Product::with(['images' => function($q) {
            return $q->where('id', '!=', $this->product['cover_id']);
        }, 'images.getSmall'])->where('uuid', $this->uuid)->first();
        return view('livewire.uploads.components.images1-field-uploads', ['product' => $this->product]);
    }
}
