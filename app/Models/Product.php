<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \App\Support\ImageTrait;
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

    public function categories()
    {
        return $this->hasOne(\App\Models\Category::class,'id', 'categories_id');
    }

    public function values()
    {
        $attrs = $this->attr;
        $values = collect();
        $attrs->each(function($att, $i) use ($values){
            $att->values->each(function($value,$j) use ($values){
                $values->push($value);
            });
        });

        return $values;
    }

    public function skus()
    {
        return $this->hasMany(\App\Models\Sku::class, 'product_id');
    }

    public function image()
    {
        return $this->hasOne(\App\Models\Image::class, 'id_ref', 'id');
    }

    public function images()
    {
        return $this->hasMany(\App\Models\Image::class, 'id_ref', 'id');
    }
}
