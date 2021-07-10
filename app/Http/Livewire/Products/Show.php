<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Http\Traits\CreateOrderRequests;

class Show extends Component
{
    use CreateOrderRequests;
    public $slug;
    public $product;
    public $cover;
    public $reviews = 0;

    public function mount($id)
    {
        $this->slug = $id;
        Product::where('slug', $id)->increment('viewers', 1);
    }

    public function setToCart()
    {
        $this->emit('addToCart', $this->product['id']);
    }

    public function setToWishlist()
    {
        $this->emit('addToWish', $this->product['id']);
    }

    public function setOrder()
    {
        $data = array(
            'id' => $this->product['id'],
            'customer_id' => auth()->user()->id,
            'job_description' => null,
            'seller_id' => $this->product['seller_id'],
            'location_id' => null,
            'title' => $this->product['title'],
            'description' => null,
            'max_return' => $this->product['revision_amount'],
            'is_meet_seller' => false,
            'price' => $this->product['price'],
            'contract_end' => now()->addDays(10),
            'meet_at' => null,
        );
        $this->createRequest($data);
    }


    public function setCover($path)
    {
        $this->cover = $path;
    }


    public function render()
    {
        $this->product = Product::where([
                ['slug', $this->slug],
                ['is_active', true],
                ])->first();
        foreach($this->product['requests'] as $item) {
            if (! empty($item['contract']['feedback'])) {
                $this->reviews += 1;
            }
        }
        if(! empty($this->product)) {
            return view('livewire.products.show');
        } else {
            abort(404);
        }
    }
}
