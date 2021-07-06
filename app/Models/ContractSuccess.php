<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractSuccess extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'seller_id',
        'contract_id',
    ];
}
