<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'price',
        'quantity',
        'sku_id',
        'session_id',
        'product_id',
        'user_id'
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }

    public function sku()
    {
        return $this->belongsTo(\App\Models\Sku::class, 'sku_id');
    }
}
