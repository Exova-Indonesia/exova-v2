<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageDimension extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_id",
        "small",
        "medium",
        "large",
        "original",
    ];

    public function getSmall()
    {
        return $this->belongsTo(File::class, 'small');
    }

    public function getMedium()
    {
        return $this->belongsTo(File::class, 'medium');
    }

    public function getLarge()
    {
        return $this->belongsTo(File::class, 'large');
    }

    public function getOriginalImage()
    {
        return $this->belongsTo(File::class, 'original');
    }
}
