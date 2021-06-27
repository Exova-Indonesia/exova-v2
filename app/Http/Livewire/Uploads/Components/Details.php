<?php

namespace App\Http\Livewire\Uploads\Components;

use App\Models\Style;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Details extends Component
{
    public $namaproject;
    public $style;
    public $deskripsi;
    public $kategori;
    public $subkategori;
    public $segmentedSubcategory;
    public $allCategory;
    public $allStyles;
    public $strLengthDes;
    public $tags;
    public $uuid;
    public $product = [];

    protected $listeners = ["updateDetails"];
    protected $rules = [
        'namaproject' => 'required|min:6',
        'style' => 'required',
        'kategori' => 'required',
        'subkategori' => 'required',
        'deskripsi' => 'required|max:200',
    ];

    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
        $this->product = Product::where('uuid', $this->uuid)->first();
        $this->allCategory = Category::all();
        $this->allStyles = Style::all();
        $this->namaproject = $this->product['title'] ?? '';
        $this->deskripsi = $this->product['description'] ?? '';
        $this->tags = $this->product['tags'] ?? '';
        $this->style = $this->product['style'] ?? '';
    }

    public function updatedKategori()
    {
        $this->segmentedSubcategory = SubCategory::where('category_id', $this->kategori)->get();
    }

    public function updateDetails()
    {
        $this->validate();
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
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Something wrong!']);
            }
        }

    public function updatedNamaproject()
    {
        $this->emit('namaproject', $this->namaproject);
    }
    public function render()
    {
        $this->strLengthDes = strlen($this->deskripsi);
        return view('livewire.uploads.components.details');
    }
}
