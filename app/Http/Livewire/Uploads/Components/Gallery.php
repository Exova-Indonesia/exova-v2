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

    protected $listeners = ["updateGallery"];
    
    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
    }

    public function updateGallery()
    {
        try {
            Product::updateOrCreate([
                "uuid" => $this->uuid,
                "seller_id" => auth()->user()->id,
            ],[
                "youtube_url" => $this->urlyoutube ?? '',
            ]);
            $this->emit("nextPage");
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updatedUrlyoutube()
    {
        try {
            $data = explode('/', $this->urlyoutube);
            (! $data[3] || strlen($data[3]) !== 11) ? $parsedUrlyoutube == "error" :
            $this->parsedUrlyoutube = $data[3];
            $this->success = true;
        } catch (\Throwable $th) {
            $this->error = "Error, Please use another url";
        }
    }
    public function render()
    {
        $this->product = Product::with('cover.getSmall')->where('uuid', $this->uuid)->first();
        return view('livewire.uploads.components.gallery');
    }
}
