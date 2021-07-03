<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'request_id',
        'customer_id',
        'seller_id',
        'payment_id',
        'feedback_id',
        'terms_id',
        'deal_price',
        'fees',
        'earn',
        'status',
        'start_at',
        'end_at',
    ];

    protected $dates = [
        'start_at',
        'end_at',
    ];

    public function requests()
    {
        return $this->belongsTo(OrderRequest::class, 'request_id');
    }
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function files()
    {
        return $this->hasMany(ContractFile::class, 'contract_id');
    }

    public function returned()
    {
        return $this->hasMany(ContractFileReturned::class, 'contract_id');
    }

    const IS_WAITING_PAYMENT = 0;
    const IS_STARTED = 1;
    const IS_REQUESTED = 2;
    const IS_RETURNED = 3;
    const IS_FINISHED = 4;
    const IS_CANCELED = 5;
}
