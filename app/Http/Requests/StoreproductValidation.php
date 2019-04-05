<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproductValidation extends FormRequest
{
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
            'name'=>'required|max30',
            'price'=>'required|min10',
            'quantity'=>'required|min1',
            'path'=>'required|min1',
        ];
    }
    public function messages(){
     return[
        'name.required'=>'bạn vui lòng nhập tên sản phẩm',
        'price.required'=>'bạn vui lòng nhập giá sản phẩm',
        'quantity.required'=>'bạn vui lòng nhập số lượng sản phẩm',
        'path.required'=>'bạn vui lòng chọn ảnh sản phẩm',
        ];
    }
}
