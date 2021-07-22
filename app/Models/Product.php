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
        "viewers",
        "youtube_url",
        "is_active", 
        "deleted_at", 
    ];
    
    protected $dates = ["deleted_at"];

    public function images()
    {
        return $this->hasMany(ProductImageDimension::class, 'product_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }

    public function style()
    {
        return $this->belongsTo(Style::class, 'style_id');
    }

    public function cover()
    {
        return $this->belongsTo(ProductImageDimension::class, 'cover_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function pricetype()
    {
        return $this->belongsTo(PriceType::class, 'price_type_id');
    }

    public function tambahan()
    {
        return $this->hasMany(ProductAdditional::class, 'product_id');
    }

    public function requests()
    {
        return $this->hasMany(OrderRequest::class, 'product_id');
    }
}
