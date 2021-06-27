<?php
namespace App\Http\Traits;

use App\Models\Product;

trait Cart {
    public $cart = array();
    public $product;
    public function add($id)
    {
        try {
            $this->product = Product::where('id', $id)->first();
            $this->cart = session()->get('cart');
            $this->cart[$id] = array(
                "id" => $id,
                "title" => $this->product['title'],
                "subcategory" => $this->product['subcategory']['name'],
                "price" => $this->product['price'],
                "cover" => $this->product['cover']['getSmall']['path'],
            );
            $this->set($this->cart);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Produk telah ditambah ke troli']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Produk gagal ditambah ke troli']);
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