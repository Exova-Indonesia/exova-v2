<?php

namespace App\Http\Livewire\Uploads\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadPictures;

class CoverFieldUploads extends Component
{
    use WithFileUploads, UploadPictures;
    public $cover;
    public $uuid;
    public $product;

    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
    }
    
    public function updatedCover()
    {
        $this->updatePictures($this->cover, 'cover');
        $this->product = Product::with('cover.getSmall')->where('uuid', $this->uuid)->first();
        $this->emit('updatePreview');
    }

    public function deleteCover($id)
    {
        $this->deletePictures($id);
        $this->emit('updatePreview');
    }

    public function render()
    {
        $this->product = Product::with('cover.getSmall')->where('uuid', $this->uuid)->first();
        return view('livewire.uploads.components.cover-field-uploads', ['product' => $this->product]);
    }
}
