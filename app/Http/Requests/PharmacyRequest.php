<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PharmacyRequest extends FormRequest
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
            'name' => 'required',
            'license'=>'required',
            'accept'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'يجب إدخال كلمة المرور',
            'name.required' => 'يجب إدخال اسم الصيدلية',
            'license.required'=>'عليل إدخال الترخيص',
            'accept.required' => 'يجب ان توافق على الشروط '
            ];
    }
}
