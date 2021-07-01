<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'product_id',
        'seller_id',
        'customer_id',
        'location_id',
        'title',
        'description',
        'max_return',
        'is_meet_seller',
        'price',
        'due_at',
        'meet_at',
        'status',
        'deleted_at',
    ];

    public const IS_REQUESTED = 0;
    public const IS_APPROVED = 1;

    protected $dates = ["deleted_at", "meet_at", "due_at"];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
