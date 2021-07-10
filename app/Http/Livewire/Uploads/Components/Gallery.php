<?php

namespace App\Http\Livewire\Uploads\Components;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads;

    public $urlyoutube;
    public $uuid;
    public $product;
    public $parsedUrlyoutube;
    public $success = false;

    protected $listeners = ["updateGallery", "updatePreview"];
    
    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
        $this->product = Product::with('cover.getSmall')->where('uuid', $this->uuid)->first();
        $this->urlyoutube = $this->product['youtube_url'];
    }

    public function updateGallery()
    {
        try {
            Product::updateOrCreate([
                "uuid" => $this->uuid,
                "seller_id" => auth()->user()->id,
            ],[
                "youtube_url" => $this->parsedUrlyoutube,
            ]);
            $this->emit("nextPage");
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Something wrong!']);
        }
    }

    public function updatePreview()
    {
        $this->emit('updateCardProduct');
    }

    public function updatedUrlyoutube()
    {
        try {
            $data = explode('/', $this->urlyoutube);
            (! $data[3] || strlen($data[3]) !== 11) ? $this->parsedUrlyoutube == "error" :
            $this->parsedUrlyoutube = $data[3];
            $this->success = true;
            $this->emit('updateYoutubePreview', $this->parsedUrlyoutube);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Error, Please use another url']);
        }
    }

    public function render()
    {
        $this->product = Product::with('cover.getSmall')->where('uuid', $this->uuid)->first();
        return view('livewire.uploads.components.gallery',  ['product' => $this->product]);
    }
}
