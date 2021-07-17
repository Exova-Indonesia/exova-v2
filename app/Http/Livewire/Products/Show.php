<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use App\Http\Traits\Cart;
use App\Http\Traits\Wishlist;
use App\Models\Wishlist as WS;
use App\Http\Traits\CreateOrderRequests;

class Show extends Component
{
    use CreateOrderRequests, Cart, Wishlist;
    public $share = false;
    public $slug;
    public $product;
    public $cover;
    public $reviews = 0;

    protected $queryString = ['share'];

    public function mount($id)
    {
        if(! auth()->check() && $this->share == false) {
            return redirect(route('login'));
        }
        $this->slug = $id;
        Product::where('slug', $id)->increment('viewers', 1);
    }

    public function setToCart()
    {
        if(!auth()->check()) {
            return redirect(route('login'));
        }
        $this->add($this->product['id']);
    }

    public function setToWishlist()
    {
        if(!auth()->check()) {
            return redirect(route('login'));
        }
        $data = WS::where([
            ['user_id', auth()->user()->id],
            ['product_id', $this->product['id']],
        ])->first();
        $product = Product::where([
            ['id', $this->product['id']],
            ['seller_id', auth()->user()->id],
        ])->first();
        if(! $product) {
            if(! $data) {
                $this->addWish($this->product['id']);
            } else {
                $this->removeWish($this->product['id']);
            }
        } else {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Mana boleh wishlist produk sendiri']);
        }
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
