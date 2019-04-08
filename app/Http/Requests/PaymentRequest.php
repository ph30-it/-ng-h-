<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
          'name'   => 'required|min:3',
          'phone'   => 'required|min:9',
          'address'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
          'name.required'   => 'Vui lòng nhập tên người nhận',
          'name.min'   => 'Họ tên lớn hơn 3 ký tự.',
          'phone.required'=>'Vui lòng nhập số điện thoại',
          'phone.min'=>'Số điện thoại không nhỏ hơn 9',
          'address.required'  => 'Vui lòng nhập địa chỉ',
          'address.min'=>'Địa chỉ không nhỏ hơn 5 ký tự',
      
        ];
    }
}
