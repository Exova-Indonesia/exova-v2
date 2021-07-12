<?php

namespace App\Http\Livewire\Uploads\Components;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductAdditional;

class Pricing extends Component
{
    public $tambahan = [];
    public $value = [];
    public $namatambahan;
    public $deskripsitambahan;
    public $hargatambahan;
    public $uuid;
    public $harga;
    public $tipeharga;
    public $hargaRevisian;
    public $jumlahrevisian;
    public $product;
    protected $rules = [
        'harga' => 'required',
        'tipeharga' => 'required',
        'jumlahrevisian' => 'required',
    ];

    protected $listeners = ['updatePricing' => 'updatePrice'];


    public function updatedHarga()
    {
        try {
            $this->harga = str_replace(['.', 'Rp'], '', $this->harga);
            $this->harga = 'Rp' . number_format($this->harga, 0, ',', '.');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
        $this->product = Product::with('tambahan')->where('uuid', $this->uuid)->first();
        
        $this->harga = $this->product['price'];
        $this->tipeharga = $this->product['price_type_id'];
        $this->hargaRevisian = $this->product['revision_price'];
        $this->jumlahrevisian = $this->product['revision_amount'];
        
        if(count($this->product['tambahan']) > 0) {
            foreach ($this->product['tambahan'] as $key => $value) {
                $this->tambahan[] = 
                    [
                        'id' => $value['id'],
                        'namatambahan' => $value['title'],
                        'deskripsitambahan' => $value['description'],
                        'hargatambahan' => $value['price'],
                    ];
            }
        } else {
            $this->tambahan = [
                [
                    'id' => '',
                    'namatambahan' => '',
                    'deskripsitambahan' => '',
                    'hargatambahan' => '',
                ]
            ];
        }
    }

    public function AddTambahan()
    {
        $this->tambahan[] = [
            'id' => '',
            'namatambahan' => '',
            'deskripsitambahan' => '',
            'hargatambahan' => '',
        ];
    }

    public function updatePrice()
    {
        $this->harga = str_replace(['.', 'Rp'], '', $this->harga);
        $this->validate();
        try {
            Product::updateOrCreate([
                "uuid" => $this->uuid,
                "seller_id" => auth()->user()->id,
            ],[
                "price" => $this->harga,
                "price_type_id" => $this->tipeharga,
                // "revision_price" => $this->hargaRevisian,
                "revision_amount" => $this->jumlahrevisian,
            ]);
            // foreach ($this->tambahan as $key => $value) {
            //     $product = new ProductAdditional;
            //     $product->updateOrCreate([
            //         'id' => $value['id'],
            //         'product_id' => $this->product['id'],
            //     ],[
            //         'title' => $value['namatambahan'],
            //         'description' => $value['deskripsitambahan'],
            //         'price' => $value['hargatambahan'],
            //     ]);
            // }
            $this->emit('nextPage');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Something wrong!']);
        }
    }

    public function deleteTambahan($index)
    {
        $product = new ProductAdditional;
        $product->where('id', $this->tambahan[$index]['id'])->delete();
        unset($this->tambahan[$index]);
        $this->tambahan = array_values($this->tambahan);
    }

    public function render()
    {
        return view('livewire.uploads.components.pricing');
    }
}
