<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'price', 
        'quantity',
        'discount',
        'total_price',
        'sku_id'
    ];

    public function sku()
    {
        return $this->belongsTo(\App\Models\Sku::class, 'sku_id');
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }
    
}
