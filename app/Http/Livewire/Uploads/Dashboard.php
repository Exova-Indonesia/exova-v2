<?php

namespace App\Http\Livewire\Uploads;

use App\Models\Style;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadPictures;

class Dashboard extends Component
{
    use UploadPictures, WithFileUploads;
    public $name;
    public $deskripsi;
    public $harga;
    public $tipeharga;
    public $kategori;
    public $style;
    public $files;
    public $subkategori;
    public $allCategory;
    public $segmentedSubcategory = [];
    public $allStyles;
    public $product;
    public $uuid;
    
    public function mount($id)
    {
        $this->uuid = $id;
        $this->product = Product::where([['uuid', $this->uuid],['seller_id', auth()->user()->id]])->first();
        $this->name = $this->product['title'];
        $this->harga = 'Rp' . number_format($this->product['price'], 0, ',', '.');
        $this->tipeharga = $this->product['price_type_id'];
        $this->style = $this->product['style_id'];
        $this->deskripsi = $this->product['description'];
        
        $category = SubCategory::where('id', $this->product['subcategory_id'])->first();
        $this->kategori = $category['category_id'];
        $this->segmentedSubcategory = SubCategory::where('category_id', $this->kategori)->get();
        $this->subkategori = $this->product['subcategory_id'];

    }

    public function updatedKategori()
    {
        $this->segmentedSubcategory = SubCategory::where('category_id', $this->kategori)->get();
    }

    public function updatedFiles()
    {
        if(! empty($this->files)) {
            $this->updatePictures($this->files);
            $this->emit('updateCardProduct');
        }
    }

    public function deletePicture($id)
    {
        $this->deletePictures($id);
        $this->emit('updateCardProduct');
    }

    public function Cover($id)
    {
        $this->setCover($id);
        $this->emit('updateCardProduct');
    }

    public function back()
    {
        return redirect(url('user/studio/' .auth()->user()->username));   
    }

    public function saveAsDraf()
    {
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "is_active" => false,
        ]);
        return redirect(url('user/studio/' .auth()->user()->username));
    }

    public function updatedName()
    {
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "title" => $this->name,
            'slug' => Str::slug($this->name) . '-' . rand(0, 9999),
        ]);
        $this->emit('updateCardProduct');
    }

    public function updatedSubkategori()
    {
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "subcategory_id" => $this->subkategori,
        ]);
        $this->emit('updateCardProduct');
    }

    public function updatedStyle()
    {
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "style_id" => $this->style,
        ]);
        $this->emit('updateCardProduct');
    }

    public function updatedHarga()
    {
        $this->harga = str_replace(['.', 'Rp', ' '], '', $this->harga);
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "price" => (int) $this->harga,
        ]);
        $this->emit('updateCardProduct');
        $this->harga = 'Rp' . number_format((int) $this->harga, 0, ',', '.');
    }

    public function updatedTipeharga()
    {
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "price_type_id" => $this->tipeharga,
        ]);
        $this->emit('updateCardProduct');
    }

    public function updatedDeskripsi()
    {
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "description" => $this->deskripsi,
        ]);
        $this->emit('updateCardProduct');
    }

    public function publish()
    {
        if(empty($this->product['cover_id'])) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Tidak keren!, Kamu belum set cover']);
        } else if(empty($this->product['title']) || empty($this->product['price']) || empty($this->product['price_type_id']) || empty($this->product['subcategory_id'])) {
            $this->dispatchBrowserEvent('notification',
            ['type' => 'error',
            'title' => 'Tidak keren!, Data belum lengkap']);
        } else {
            Product::updateOrCreate([
                "uuid" => $this->uuid,
                "seller_id" => auth()->user()->id,
            ],[
                "is_active" => true,
            ]);
            return redirect(url('user/studio/' .auth()->user()->username));
        }
    }
    
    public function render()
    {
        $this->product = Product::where('uuid', $this->uuid)->first();
        if(empty($this->product)) {
            abort(404);
        }
        $this->allCategory = Category::all();
        $this->allStyles = Style::all();
        return view('livewire.uploads.dashboard');
    }
}
