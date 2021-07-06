<?php 
namespace App\Http\Traits;

use App\Models\User;
use App\Models\Xpoint;
use App\Models\Revenue;
use Illuminate\Support\Str;
use App\Models\OrderRequest;
use App\Models\ContractSuccess;
use App\Models\Contract as Cntr;
use App\Models\ContractCanceled;
use App\Models\ContractFileReturned;
/**
 * 
 */
trait Contract
{
    public $contract;
    public $fees;
    public $uuid;
    public $f = 0;
    public function createContract()
    {
        try {
            $order = new OrderRequest;
            $request = $order->where('id', (int) session()->get('chat.room'));
            $request->update([
                'status' => OrderRequest::IS_APPROVED,
            ]);
            $fetchRequest = $request->first();
    
            $this->fees($fetchRequest->price);
    
            $this->contract = Cntr::create([
                'uuid' => Str::uuid(),
                'request_id' => (int) session()->get('chat.room'),
                'customer_id' => $fetchRequest->customer_id,
                'seller_id' => $fetchRequest->seller_id,
                'deal_price' => $fetchRequest->price,
                'fees' => $this->f,
                'status' => Cntr::IS_WAITING_PAYMENT,
                'start_at' => null,
                'end_at' => null,
            ]);

            // Event Notifications

            return redirect(url('contracts/' . $this->contract['uuid']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateContract($id)
    {
        // 
    }

    public function finish()
    {
        ContractSuccess::create([
            'customer_id' => $this->data['customer_id'],
            'seller_id' => $this->data['seller_id'],
            'contract_id' => $this->data['id'],
        ]);
        Revenue::create([
            'user_id' => $this->data['seller_id'],
            'contract_id' => $this->data['id'],
            'amount' => $this->data['earn'],
        ]);
        User::where('id', $this->data['seller_id'])
        ->update([
            'balance' => $this->data['seller']['balance'] + $this->data['earn'],
        ]);
        Xpoint::create([
            'user_id' => $this->data['seller_id'],
            'value' => 5,
        ]);
    }

    public function cancel()
    {
        ContractCanceled::create([
            'customer_id' => $this->data['customer_id'],
            'seller_id' => $this->data['seller_id'],
            'contract_id' => $this->data['id'],
        ]);
    }

    public function requestReturn()
    {
        try {
            ContractFileReturned::create([
                'contract_id' => $this->data['id'],
                'description' => $this->return_description,
            ]);
            Cntr::where('id', $this->data['id'])->update([
                'status' => Cntr::IS_RETURNED,
            ]);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Berhasil mengirim permintaan revisi']);
            $this->revisionModal = false;

            // Event Notifications

            $this->emit('reloadContract');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Gagal mengirim permintaan revisi']);
        }
    }

    public function approve()
    {
        try {
            Cntr::where('id', $this->data['id'])->update([
                'status' => Cntr::IS_APPROVED,
                'earn' => $this->data['deal_price'] - $this->data['fees'],
            ]);
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Berhasil']);
            $this->emit('reloadContract');
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Gagal']);
        }
        
        // Event Notifications
    }

    public function updateDetails($id)
    {
        // 
    }
    
    public function fees($x)
    {
        if($x <= 1000000) {
            $this->f = $x * 0.15;
        } else if($x <= 10000000) {
            $this->f = $x * 0.10;
        } else if($x > 10000000) {
            $this->f = $x * 0.05;
        }
    }
}

?>