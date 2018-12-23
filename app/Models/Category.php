<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug', 'parent'
    ];

    
    public function childrend()
    {
        return $this->hasMany(static::class,'parent_id', 'id');
    }
}
