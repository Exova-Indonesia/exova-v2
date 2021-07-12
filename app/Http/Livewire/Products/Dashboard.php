<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public $search = '';
    public $amount = 10;
    public $filter;
    public $newFilter = ['updated_at', 'asc'];

    protected $queryString = ["filter"];

    public function loadMore()
    {
        $this->amount += 10;
    }

    public function updatedFilter()
    {
        $this->newFilter = [];
        if($this->filter == 'price') {
            $this->newFilter = [
                'price',
                'DESC'
            ];
        } else if($this->filter == 'view') {
            $this->newFilter = [
                'viewers',
                'DESC'
            ];
        } else if($this->filter == 'new') {
            $this->newFilter = [
                'updated_at',
                'ASC'
            ];
        } else if($this->filter == 'trends') {
            $this->newFilter = [
                'viewers',
                'DESC'
            ];
        }
    }

    public function render()
    {
        return view('livewire.products.dashboard', [
            'productAmount' => Product::count(),
            'product' => Product::with('cover.getSmall')->where([
                ['title', 'LIKE', '%' . $this->search . '%'],
                ['is_active', true],
                ])->orWhere('subcategory_id', $this->filter)->take($this->amount)->orderby($this->newFilter[0], $this->newFilter[1])->get()
        ]);
    }
}
