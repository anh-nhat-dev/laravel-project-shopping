<?php 
namespace App\Support;

trait ImageTrait {

    
    public function getThumbnailAttribute()
    {
        if (is_callable(array($this, 'image'))) {
            if (!is_null($image = $this->image()->thumbnail()->zone()->first())) {
                return $image->link;
            }
        }
        return $image;
    }

    public function getGalleryAttribute()
    {
        if (is_callable(array($this, 'images'))) {
            return $this->images()->gallery()->zone()->get();
        }
        return array();
    }
}