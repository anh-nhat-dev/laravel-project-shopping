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

    protected $with = ['value'];

    //Lấy chi tiết giá trị
    public function value()
    {
        return $this->belongsTo(\App\Models\ProductAttributeValue::class, 'value_id', 'id');
    }

    public function attribute()
    {
        return $this->belongsTo(\App\Models\ProductAttribute::class, 'attribute_id');
    }
}
