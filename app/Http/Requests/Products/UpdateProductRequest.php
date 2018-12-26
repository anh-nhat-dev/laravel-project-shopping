<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    use \App\Support\AddSlugToRequest;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => "required|unique:products,slug,{$this->segment(3)},id",
            'price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'categories_id' => 'required|numeric',
            'status' => 'required',
            'quantity' => 'required|numeric',
            'attributes.*.name' => 'required',
            'attributes.*.value' => 'required',
            'thumbnail' => 'required'
        ];
    }
}
