<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser_profileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname'=>'required',
            'phone'=>'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'اكتب اسمك الكامل',
            'phone.required'=>'اكتب رقم هاتفك',
            'phone.numeric'=>'يجب كتابة أرقام فقط'
        ];
    }
}
