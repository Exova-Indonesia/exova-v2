<?php

namespace App\Http\Livewire\Wishlists;

use Livewire\Component;
use App\Models\Wishlist;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.wishlists.dashboard', [
            'productAmount' => Wishlist::count(),
            'product' => Wishlist::with(['product' => function($q) {
                $q->where('is_active', true);
            }])
            ->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
