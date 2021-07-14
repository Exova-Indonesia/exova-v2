<?php

namespace App\Http\Livewire\Components;

use Storage;
use App\Models\User;
use Livewire\Component;
use App\Models\Withdraw;
use App\Models\BankAccount;

class CardBankAccount extends Component
{
    public $isOpen = false;
    public $isOpenWd = false;
    public $isBtnActive = false;
    public $data;
    public $bank;
    public $banks;
    public $name;
    public $number;
    public $amount;

    protected $rules = [
        'name' => 'required',
        'number' => 'required',
        'bank' => 'required',
    ];

    public function mount($data)
    {
        $this->data = $data;
        $this->bank = $this->data['banks']['code'];
        $this->name = $this->data['banks']['name'];
        $this->number = $this->data['banks']['number'];
        $this->collect = file_get_contents('js/banks.json');
        $this->banks = json_decode($this->collect, true);
    }

    public function saveBank()
    {
        $this->validate();
        try {
            $collection = collect($this->banks);
            $filter = $collection->where('code', $this->bank)->first();
            BankAccount::updateOrcreate([
                'user_id' => auth()->user()->id,
            ],[
                'user_id' => auth()->user()->id,
                'channel' => $filter['name'],
                'code' => $filter['code'],
                'number' => $this->number,
                'name' => $this->name,
            ]);
            // $this->emit('reloadData');
            $this->isOpen = false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function setWithdraw()
    {
        $this->validate([
            'amount' => 'required|integer'
        ]);
        try {
            $balance = $this->data['balance'] - (int) $this->amount;
            Withdraw::create([
                'user_id' => $this->data['id'],
                'bank_id' => $this->data['banks']['id'],
                'amount' => (int) $this->amount,
                'status' => Withdraw::IS_PENDING,
            ]);
            User::where('id', $this->data['id'])->update(['balance' => $balance]);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Saldo kamu akan masuk rekening minimal 3 hari setelah penarikan']);
            $this->isOpenWd = false;
            $this->emit('reloadData');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function render()
    {
        $this->data = auth()->user();
        if($this->amount > $this->data['balance'] && $this->isOpenWd) {
            $this->isBtnActive = false;
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Saldo kamu tidak cukup']);
        } else {
            $this->isBtnActive = true;
        }
        return view('livewire.components.card-bank-account');
    }
}
