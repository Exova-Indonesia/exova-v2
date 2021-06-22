<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "uuid",
        "slug",
        "seller_id",
        "subcategory_id",
        "style_id",
        "cover_id",
        "title",
        "description",
        "price",
        "price_type_id",
        "revision_price",
        "revision_amount",
        "tags",
        "youtube_url",
        "is_active", 
        "deleted_at", 
    ];
    
    protected $dates = ["deleted_at"];

    public function images()
    {
        return $this->hasMany(ProductImageDimension::class, 'product_id');
    }

    public function cover()
    {
        return $this->belongsTo(ProductImageDimension::class, 'cover_id');
    }

    public function tambahan()
    {
        return $this->hasMany(ProductAdditional::class, 'product_id');
    }
}