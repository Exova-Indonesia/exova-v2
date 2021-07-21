<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public $search;
    public $type = 'jasa';

    protected $queryString = ["search", "type"];

    public function updatedSearch()
    {
        $this->emit('setSearch', $this->search);
    }

    public function render()
    {
        return view('livewire.products.dashboard');
    }
}
