<?php

namespace App\Http\Livewire\Contracts;

use App\Models\Payment;
use Livewire\Component;
use App\Http\Traits\Contract as Ctr;
use App\Models\Contract;

class Dashboard extends Component
{
    use Ctr;
    public $content = 'details';
    public $uuid;
    public $data;
    public $endContract;
    protected $listeners = ["loadContent", "reloadContract"];

    public function mount($id)
    {
        $this->uuid = $id;
    }

    public function loadContent($content)
    {
        if($content == 'chats') {
            $this->emit('loadChats', $this->data['request_id']);
        }
        if($content == 'end') {
            $this->endContract = true;
        }
        $this->content = $content;
    }

    public function finishContract()
    {
        if($this->data['status'] == Contract::IS_APPROVED && $this->data['payment']['status'] == Payment::IS_SUCCESS) {
            Contract::where('uuid', $this->uuid)->update([
                'status' => Contract::IS_FINISHED,
                'end_at' => now(),
            ]);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Berhasil mengakhiri kontrak']);
            $this->endContract = false;
            $this->finish();
            return redirect(url('/contracts'));
        } else {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Kiriman file harus diapprove terlebih dahulu sebelum akhiri kontrak']);
        }
    }

    public function cancelContract()
    {
        Contract::where('uuid', $this->uuid)->update([
            'status' => Contract::IS_CANCELED,
            'end_at' => now(),
        ]);
        $this->endContract = false;
        $this->cancel();
        return redirect(url('/contracts'));
        $this->dispatchBrowserEvent('notification', 
        ['type' => 'success',
        'title' => 'Berhasil mengakhiri kontrak']);
    }

    public function reloadContract()
    {
        $this->data = Contract::where('uuid', $this->uuid)->first();
        $this->emit('reloadData');
    }

    public function updateOrderRequest()
    {
        $this->emit('updateOrderRequest');
    }

    public function pay()
    {
        $this->emit('pay');
    }

    public function render()
    {
        $this->data = Contract::where('uuid', $this->uuid)->first();
        if(in_array(auth()->user()->id, [$this->data['seller_id'], $this->data['customer_id']])) {
            return view('livewire.contracts.dashboard');
        } else {
            abort(404);
        }
    }
}
