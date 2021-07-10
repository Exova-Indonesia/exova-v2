<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use App\Models\Payment;
use App\Models\Contract;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Events\ContractEvent;
Config::$serverKey = env('MID_KEY');
Config::$isProduction = env('MID_PRODUCTION');
Config::$isSanitized = env('MID_SANITIZED');

class PaymentHandlerController extends Controller
{
    public function index()
    {
        $notif = new Notification();
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id ." is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            Payment::where('id', $order_id)->update([
                'status' => Payment::IS_SUCCESS
            ]);
            Contract::where('payment_id', $order_id)->update([
                'status' => Contract::IS_STARTED,
            ]);
            $contract = Contract::where('payment_id', $order_id)->get();
            foreach ($contract as $key => $value) {
                event(new ContractEvent($value));
            }
        } else if ($transaction == 'pending') {
            Payment::where('id', $order_id)->update([
                'status' => Payment::IS_PENDING
            ]);
        } else if ($transaction == 'deny') {
            Payment::where('id', $order_id)->update([
                'status' => Payment::IS_REJECTED
            ]);
        } else if ($transaction == 'expire') {
            Payment::where('id', $order_id)->update([
                'status' => Payment::IS_FAILED
            ]);
        } else if ($transaction == 'cancel') {
            Payment::where('id', $order_id)->update([
                'status' => Payment::IS_FAILED
            ]);
        }
    }
}
