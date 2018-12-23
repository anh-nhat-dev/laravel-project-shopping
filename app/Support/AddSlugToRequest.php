<?php
namespace App\Support;

trait AddSlugToRequest {
    /**
     * Chuẩn bị đi vào giai đoạn Validation form 
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        //Tự động tạo ra slug và thêm vào mảng validatior
        $this->merge(['slug'=> str_slug($this->name)]);
    }
}