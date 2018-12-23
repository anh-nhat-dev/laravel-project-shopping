<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    // Đây là trait giúp tạo ra slug trước khi tiến hành validation
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
            'slug' => "required|unique:categories,slug,{$this->segment(3)},id",
            'description' => 'required'
        ];
    }
}
