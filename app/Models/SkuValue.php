<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkuValue extends Model
{
    protected $fillable = [
        'sku_id',
        'product_id',
        'value_id',
        'attribute_id'
    ];
}
