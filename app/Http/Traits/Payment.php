<?php 
namespace App\Http\Traits;

use Midtrans\Snap;
use App\Models\Contract;
use App\Models\Payment as PM;

/**
 * 
 */
trait Payment
{
    public function createPayment()
    {
        if(! empty($this->adminfee)) {
            $this->addDetails();
            try {
                $this->paymentUrl = Snap::createTransaction($this->params)->redirect_url;
                $this->storePayToDb();
                return redirect($this->paymentUrl);
            } catch (\Throwable $th) {
                dd($th);
                $this->dispatchBrowserEvent('notification', 
                ['type' => 'error',
                'title' => 'Pembayaran gagal']);
            }
        } else {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Pilih metode pembayaran terlebih dahulu']);
        }
    }

    public function addDetails()
    {
        $this->items = [];
        foreach ($this->contract as $key => $value) {
            $this->items[] = array(
                'id'       => $value['id'],
                'price'    => $value['deal_price'],
                'quantity' => 1,
                'name'     => $value['requests']['title']
            );
        }
        $this->createPaymentMethod();
        $this->items[] = array(
            'id'       => rand(),
            'price'    => -$this->discount,
            'quantity' => 1,
            'name'     => 'Discount'
        );

        $trans_details = array(
            'order_id' => $this->payment_id,
            'gross_amount' => $this->total,
        );
        $this->params = array(
            'transaction_details' => $trans_details,
            'item_details' => $this->items,
            'customer_details' => array(
                'first_name' => $this->user['name'],
                'email' => $this->user['email'],
                // 'phone' => '08111222333',
            ),
            'enabled_payments' => array(
                $this->paymentMethodCode,
            )
        );
    }

    public function storePayToDb()
    {
        try {
            PM::updateOrCreate([
                'id' => $this->payment_id,
                'user_id' => auth()->user()->id,
                'channel' => $this->paymentMethodCode,
                'subtotal' => $this->totalContract,
                'discount' => $this->discount ?? 0,
                'admin_fees' => $this->adminfee,
                'total' => $this->total,
                'paid' => 0,
                'path' => $this->paymentUrl,
                'status' => PM::IS_PENDING,
            ]);
            Contract::whereIn('id', $this->selectedProducts)
            ->update([
                'payment_id' => $this->payment_id,
                'status' => Contract::IS_STARTED,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createPaymentMethod()
    { 
        $this->items[] = array(
            'id'       => rand(),
            'price'    => $this->adminfee,
            'quantity' => 1,
            'name'     => 'Admin Fee ' . $this->paymentMethod
        );
    }

    public function updatePayment($id)
    {
        // 
    }
}

?>