<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'description',
        'image',
        'price',
        'old_price',
        'variations',
        'collection_id',
        'stock'
    ];

    protected $casts = [
        'variations' => 'array',
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }


    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

}
