<?php

namespace App\Http\Livewire\Contracts\Components;

use Livewire\Component;
use App\Models\Contract;
use App\Models\Feedback  as FB;

class Feedback extends Component
{
    public $data;
    public $value;
    public $comment;

    protected $rules = [
        'value' => 'required|integer',
        'comment' => 'required',
    ];
    protected $validationAttributes = [
        'value' => 'Rating',
        'comment' => 'Komentar',
    ];

    public function mount($data)
    {
        $this->data = $data;
    }

    public function sendfeedback()
    {
        $this->validate();
        try {
            FB::create([
                'user_id' => auth()->user()->id,
                'contract_id' => $this->data['id'],
                'value' => $this->value ?? 1,
                'comment' => $this->comment,
            ]);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Berhasil memberikan feedback']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render()
    {
        $this->data = Contract::where('id', $this->data['id'])->first();
        return view('livewire.contracts.components.feedback');
    }
}
