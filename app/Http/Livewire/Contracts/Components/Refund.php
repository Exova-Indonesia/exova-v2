<?php

namespace App\Http\Livewire\Contracts\Components;

use Livewire\Component;
use App\Events\RefundSent;
use App\Models\Refund as RF;
use Illuminate\Support\Facades\Storage;

class Refund extends Component
{
    public $data;
    public $collect;
    public $banks;
    public $name;
    public $bank;
    public $number;
    public $code;

    protected $rules = [
        'name' => 'required',
        'bank' => 'required',
        'number' => 'required',
    ];

    protected $validationAttributes = [
        'name' => 'Nama Pemilik',
        'number' => 'No. Rekening',
        'bank' => 'Nama Bank',
    ];
    public function mount($data)
    {
        $this->data = $data;
        $this->collect = file_get_contents('js/banks.json');
        $this->banks = json_decode($this->collect, true);
        $this->bank = $this->banks[0]['code'];
    }

    public function setRefund()
    {
        $this->validate();

        $collection = collect($this->banks);
        $filter = $collection->where('code', $this->bank)->first();
        $rf = RF::updateOrCreate([
            'contract_id' => $this->data['id'],
        ],[
            'contract_id' => $this->data['id'],
            'name' => $this->name,
            'code' => $filter['code'],
            'number' => $this->number,
            'channel' => $filter['name'],
            'amount' => $this->data['payment']['paid'] - $this->data['payment']['admin_fees'],
            'status' => RF::IS_PENDING,
        ]);
        event(new RefundSent($rf));
    }

    public function deleteRefund($id)
    {
        // RF::where('id', $id)->delete();
    }

    public function render()
    {
        return view('livewire.contracts.components.refund', [
            'refund' => RF::where('contract_id', $this->data['id'])->first(),
        ]);
    }
}
