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
    
    public function scopePublic($query)
    {
        $query->where('status', 'public');
    }

    //Lấy giá trị của biến thể
    public function skusvalues()
    {
        return $this->hasMany(\App\Models\SkuValue::class, 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class, 'product_id');
    }

    public function scopeCates($query, $cate_id = null)
    {
        if (is_null($cate_id)){
            return $query;
        }
        return $query->where('categories_id', $cate_id);
    }

    public function scopeRangerPrice($query, $min = null, $max = null)
    {
        if (is_null($min) || is_null($min)){
            return $query;
        }
        return $query->whereBetween('sale_price', [$min, $max]);
    }

    public function scopeColor($query, $color = null)
    {
        if (is_null($color)) {
            return $query;
        }
        return $query->whereHas('skusvalues', function($query) use ($color){
            $query->whereHas('value', function ($query) use ($color){
                $query->where('value', $color);
            });
        });
    }

    public function scopeSize($query, $size = null)
    {
        if (is_null($size)) {
            return $query;
        }
        return $query->whereHas('skusvalues', function($query) use ($size){
            $query->whereHas('value', function ($query) use ($size){
                $query->where('value', $size);
            });
        });
    }
}
