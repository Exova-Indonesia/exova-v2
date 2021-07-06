<?php

namespace App\Http\Livewire\Contracts;

use Livewire\Component;
use App\Models\Contract;

class Show extends Component
{
    public $data;

    public function choose($id)
    {
        return redirect(url('contracts/' . $id));
    }

    public function render()
    {
        $this->data = Contract::where('customer_id', auth()->user()->id)
        ->orWhere('seller_id', auth()->user()->id)->orderBy('updated_at', 'DESC')->get();
        return view('livewire.contracts.show');
    }
}
