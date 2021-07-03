<?php 
namespace App\Http\Traits;

use App\Models\Contract as Cntr;
use Illuminate\Support\Str;
use App\Models\OrderRequest;
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
            return redirect(url('contracts/' . $this->contract['uuid']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateContract($id)
    {
        // 
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