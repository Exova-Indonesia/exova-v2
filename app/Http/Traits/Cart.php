<?php
namespace App\Http\Traits;

use App\Models\Product;
use App\Models\Location;

trait Cart {
    public $cart = array();
    public $product;
    public $location;
    public function add($id)
    {
        try {
            $this->product = Product::where('id', $id)->first();
            if($this->product['seller_id'] != auth()->user()->id) {
                $this->cart = session()->get('cart');
                $this->cart[$id] = array(
                    "id" => $id,
                    "seller_id" => $this->product['seller_id'],
                    "title" => $this->product['title'],
                    "subcategory" => $this->product['subcategory']['name'],
                    "price" => $this->product['price'],
                    "cover" => $this->product['cover']['getSmall']['path'],
                    "max_return" => 1,
                    "is_meet_seller" => false,
                    "contract_end" => null,
                    "meet_date" => null,
                    "meet_time" => null,
                    "meet_location" => null,
                    "job_description" => null,
                );
    
                $this->set($this->cart);
    
                $this->dispatchBrowserEvent('notification', 
                ['type' => 'success',
                'title' => 'Produk telah ditambah ke troli']);
            } else {
                $this->dispatchBrowserEvent('notification', 
                ['type' => 'error',
                'title' => 'Mana bisa beli produk sendiri']);
            }
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Produk gagal ditambah ke troli']);
        }
    }

    public function update($id, $data = null)
    {
        try {
            $this->location = Location::create([
                'name' => $data['addr_name'],
                'village' => $data['village'],
                'district' => $data['district'],
                'address' => $data['meet_location'],
                'city' => $data['city'],
                'state' => $data['state'],
                'country' => $data['country'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
            ]);
            $this->product = Product::where('id', $id)->first();
            $this->cart = session()->get('cart');
            $this->cart[$id] = array(
                "id" => $id,
                "seller_id" => $this->product['seller_id'],
                "title" => $data['title'] ?? $this->product['title'],
                "subcategory" => $this->product['subcategory']['name'],
                "price" => $data['price'] ?? $this->product['price'],
                "cover" => $this->product['cover']['getSmall']['path'],
                "max_return" => 1,
                "is_meet_seller" => $data['is_meet_seller'] ? true : false,
                "contract_end" => $data['contract_end'] ?? null,
                "meet_date" => $data['meet_date'] ?? null,
                "meet_time" => $data['meet_time'] ?? null,
                "meet_location" => $this->location['id'] ?? null,
                "job_description" => $data['job_description'] ?? null,
            );

            $this->set($this->cart);

            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Produk telah berhasil diupdate']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Produk gagal diupdate']);
        }
    }

    public function set($data)
    {
        session()->put('cart', $data);
    }

    public function get()
    {
        return session()->get('cart');
    }

    public function delete($id)
    {
        try {
            $cart = $this->get();
            unset($cart[$id]);
            $this->set($cart);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Produk telah berhasil dihapus dari troli']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Produk gagal dihapus dari troli']);
        }
    }
}
?>