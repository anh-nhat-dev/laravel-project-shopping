<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'id_ref',
        'link',
        'type',
        'zone'
      ];

    public function scopeThumbnail($query)
    {
        return $query->where('type', 'thumbnail');
    }
    public function scopeGallery($query)
    {
        return $query->where('type', 'gallery');
    }
    public function scopeZone($query, $zone = 'product')
    {
        return $query->where('zone', $zone);
    }
}
