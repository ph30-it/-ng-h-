<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
          'email'  => 'required|email',
          'name'  => 'required|min:2',
          'content'  => 'required|min:10',
        ];
    }
    public function messages()
    {
     return [
       'email.required'  => 'Vui lòng nhập email',
       'email.email'  => 'Vui lòng nhập đúng email',
       'name.required'  => 'Vui lòng nhập tên',
       'name.min'  => 'Tên phải gồm 2 ký tự trở lên',
       'content.required'  => 'Vui lòng nhập nội dung đánh giá',
       'content.min'  => 'Nội dung phải trên 10 kí tự',
            ];
    }
}
