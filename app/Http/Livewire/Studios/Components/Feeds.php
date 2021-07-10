<?php

namespace App\Http\Livewire\Studios\Components;

use Livewire\Component;

class Feeds extends Component
{
    public $product;
    public $reviews = 0;

    public function mount($product)
    {
        $this->product = $product;
        foreach($this->product['requests'] as $item) {
            if (! empty($item['contract']['feedback'])) {
                $this->reviews += 1;
            }
        }
    }

    public function render()
    {
        return view('livewire.studios.components.feeds');
    }
}
