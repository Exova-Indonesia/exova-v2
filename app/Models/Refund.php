<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'name',
        'channel',
        'code',
        'number',
        'status',
        'amount',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    const IS_PENDING = 0;
    const IS_SUCCESS = 1;
    const IS_DECLINED = 2;
}
