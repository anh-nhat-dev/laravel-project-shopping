<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'is_sale',
        'price',
        'sale_price',
        'quantity',
        'status',
        'categories_id',
        'total_star',
        'is_future'
    ];

    public function attr()
    {
        return $this->hasMany(\App\Models\ProductAttribute::class, 'product_id');
    }
}
