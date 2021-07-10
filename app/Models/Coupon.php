<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'code',
        'amount',
        'deleted_at',
        'expired_at',
    ];

    public $dates = ['deleted_at'];
}
