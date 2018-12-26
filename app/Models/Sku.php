<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $fillable = [
        'price',
        'quantity',
        'sale_price'
    ];

    protected $with = ['values'];

    
    public function values()
    {
        return $this->hasMany(\App\Models\SkuValue::class, 'sku_id', 'id');
    }
}
