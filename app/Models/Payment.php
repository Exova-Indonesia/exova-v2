<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'channel',
        'subtotal',
        'discount',
        'admin_fees',
        'total',
        'paid',
        'path',
        'status',
    ];
    const IS_PENDING = 0;
    const IS_SUCCESS = 1;
    const IS_FAILED = 2;
    const IS_REJECTED = 3;
}
