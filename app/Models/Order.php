<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'address', 
        'email',
        'phone',
        'payment_method',
        'total_price',
        'status'
    ];

    public function details()
    {
        return $this->hasMany(\App\Models\OrderDetail::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
