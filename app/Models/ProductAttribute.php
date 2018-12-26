<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    // protected $with = ['values'];

    public function values()
    {
        return $this->hasMany(\App\Models\ProductAttributeValue::class, 'attribute_id');
    }
}
