<?php

namespace App\Http\Livewire\Contracts\Components;

use Livewire\Component;

class Details extends Component
{
    public $data;
    
    public $listeners = ["pay"];

    public function mount($data)
    {
        $this->data = $data;
    }

    public function pay()
    {
        return redirect(url('payments'));
    }


    public function render()
    {
        return view('livewire.contracts.components.details');
    }
}
