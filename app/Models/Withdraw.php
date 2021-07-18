<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bank_id',
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bank()
    {
        return $this->belongsTo(BankAccount::class, 'bank_id');
    }

    const IS_PENDING = 0;
    const IS_SUCCESS = 1;
}
