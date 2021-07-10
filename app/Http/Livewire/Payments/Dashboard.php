<?php

namespace App\Http\Livewire\Payments;

use Midtrans\Config;
use App\Models\Coupon;
use Livewire\Component;
use App\Models\Contract;
use App\Http\Traits\Payment;
Config::$serverKey = env('MID_KEY');
Config::$isProduction = env('MID_PRODUCTION');
Config::$isSanitized = env('MID_SANITIZED');


class Dashboard extends Component
{
    use Payment;

    public $user;
    public $payment_id;
    public $selectedProducts = [];
    public $selectAll = false;
    public $couponModal = false;
    public $contract;
    public $totalContract;
    public $coupon;
    public $subtotal;
    public $adminfee;
    public $discount;
    public $total;
    public $paymentMethod;
    public $paymentMethodCode;
    public $paymentUrl;
    public $items;
    public $params;
    

    public function mount()
    {
        $this->user = auth()->user();
        $this->payment_id = now()->timestamp . rand(0, 1000);
    }

    public function updatedSelectAll($value)
    {
        if($value) {
            $this->selectedProducts = Contract::where([
                ['customer_id', auth()->user()->id],
                ['status', Contract::IS_WAITING_PAYMENT],
                ])->pluck('id');
        } else {
            $this->selectedProducts = [];
        }
    }

    public function bankTransfer()
    {
        $this->paymentMethod = "Bank transfer";
        $this->paymentMethodCode = strtolower(str_replace(' ', '_', $this->paymentMethod));
        $this->adminfee = 4000;
    }

    public function qris()
    {
        $this->paymentMethod = "QRIS";
        $this->paymentMethodCode = "gopay";
        $this->adminfee = $this->subtotal * 0.02;
    }

    public function setCoupon()
    {
        $coupon = Coupon::where('code', $this->coupon)->first();
        if(! empty($coupon)) {
            $this->discount = $coupon->amount;
            $this->couponModal = false;
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Selamat! kamu mendapatkan potongan sebesar' . 'Rp' . number_format($coupon->amount, 0, ',', '.')]);
        } else {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Kupon tidak valid atau telah kedaluarsa']);
        }
    }

    public function setPayment()
    {
        if(count($this->selectedProducts) > 0) {
            $this->createPayment();
        } else {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Pilih kontrak yang ingin dibayar terlebih dahulu']);
        }
    }

    public function render()
    {
        $this->contract = Contract::whereIn('id', $this->selectedProducts)->get();
        $this->totalContract = $this->contract->sum('deal_price');
        $this->subtotal = $this->totalContract - $this->discount;
        $this->total = $this->subtotal + $this->adminfee;
        return view('livewire.payments.dashboard', [
            'data' => Contract::where([
                ['customer_id', auth()->user()->id],
                ['status', Contract::IS_WAITING_PAYMENT],
                ])->get(),
        ]);
    }
}
