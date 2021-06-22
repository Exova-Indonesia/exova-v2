<?php

namespace App\Http\Livewire\Uploads\Components;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Details extends Component
{
    public $namaproject;
    public $style;
    public $deskripsi;
    public $kategori;
    public $subkategori;
    public $tags;
    public $uuid;
    public $product = [];

    protected $listeners = ["updateDetails"];

    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
        $this->product = Product::where('uuid', $this->uuid)->first();
        $this->namaproject = $this->product['title'] ?? '';
        $this->deskripsi = $this->product['description'] ?? '';
        $this->tags = $this->product['tags'] ?? '';
        $this->style = $this->product['style'] ?? '';
    }

    public function updateDetails()
    {
        try {
            Product::updateOrCreate([
                "uuid" => $this->uuid,
                "seller_id" => auth()->user()->id,
            ],[
                "uuid" => $this->uuid,
                "slug" => Str::slug($this->namaproject),
                "seller_id" => auth()->user()->id,
                "subcategory_id" => $this->subkategori,
                "style_id" => $this->style,
                "title" => $this->namaproject,
                "description" => $this->deskripsi,
                "tags" => $this->tags,
            ]);
            $this->emit("nextPage");
        } catch (\Throwable $th) {
                dd($th);
            }
        }

    public function updatedNamaproject()
    {
        $this->emit('namaproject', $this->namaproject);
    }
    public function render()
    {
        return view('livewire.uploads.components.details');
    }
}
