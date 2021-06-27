<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public $search = '';
    public $amount = 10;

    public function loadMore()
    {
        $this->amount += 10;
    }

    public function render()
    {
        return view('livewire.products.dashboard', [
            'productAmount' => Product::count(),
            'product' => Product::with('cover.getSmall')->where([
                ['title', 'LIKE', '%' . $this->search . '%'],
                ['is_active', true],
                ])->take($this->amount)->get()
        ]);
    }
}
