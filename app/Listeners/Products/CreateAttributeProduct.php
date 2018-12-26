<?php

namespace App\Listeners\Products;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAttributeProduct
{
    protected $attributes;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->handleAttributes();
        $this->saveAttributes($event);
    }
    /**
     * Xử lý dữ liệu đầu vào
     *
     * @return void
     */
    public function handleAttributes()
    {
        $attributes = app('request')->input('attributes') ?? [];
        foreach ($attributes as $attribute) {
            $slug = str_slug($attribute['name']);
            $this->attributes[$slug]['name'] = $attribute['name'];
            $this->attributes[$slug]['values'][] = [
                'value' => $attribute['value'],
                'options' => $attribute['options']
            ];
        }
    }

    /**
     * Lưu dữ liệu vào database
     *
     * @param [type] $event
     * @return void
     */
    public function saveAttributes($event)
    {
        foreach ($this->attributes as $key => $attribute) {
            $attr = $event->product->attr()->create([
                'name' => $attribute['name'],
                'slug' => $key
            ]);

            $attr->values()->createMany($attribute['values']);
        }
    }
}
