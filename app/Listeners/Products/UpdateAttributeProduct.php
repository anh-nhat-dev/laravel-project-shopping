<?php

namespace App\Listeners\Products;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateAttributeProduct
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
        $this->updateAttribute($event);
        $this->updateSku($event);
    }
    public function updateAttribute($event)
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
                'options' => $attribute['options'],
                'id' => $attribute['id']
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
            $attr = $event->product->attr()->updateOrCreate(
            [
                'slug' =>$key
            ],
            [
                'name' => $attribute['name'],
                'slug' => $key
            ]);
            foreach($attribute['values'] as $value){
                $attr->values()->updateOrCreate(['id' => $value['id']],$value);
            }
        }
    }
    /**
     * cập nhật SKU
     *
     * @param [type] $event
     * @return void
     */
    public function updateSku($event)
    {
        $skus = collect(app('request')->input('skus'));
        $skus->each(function ($item, $key) use ($event) {
            $sku = $event->product->skus()->updateOrCreate(['id' => $item['id']], $item);
            if(isset($item['values'])){
                foreach($item['values'] as $att) {
                    $sku->values()->updateOrCreate(array_merge(['product_id' => $event->product->id], $att), array_merge(['product_id' => $event->product->id], $att));
                }
            }
        });
    }
}
