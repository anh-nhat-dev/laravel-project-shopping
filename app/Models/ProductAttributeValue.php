<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = [
        'value',
        'options'
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
       $name = $this->attr->name;
       return $name;
    }

    public function attr()
    {
        return $this->belongsTo(\App\Models\ProductAttribute::class, 'attribute_id');
    }

}
