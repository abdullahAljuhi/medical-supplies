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
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
<<<<<<< HEAD:app/Http/Requests/UpdatePharmacyRequest.php
            'license'=>'required'
=======
            'accept'=>'required',
>>>>>>> dev:app/Http/Requests/PharmacyRequest.php
        ];
    }

    public function messages()
    {
        return [

            'email.required' => 'يجب إدخال البريد الالكتروني ',
            'email.email' => 'صيغة البريد الالكتروني غير صحيحة ',
            'password.required' => 'يجب إدخال كلمة المرور',
            'name.required' => 'يجب إدخال اسم الصيدلية',
            'license.required'=>'عليل إدخال الترخيص',
            'accept.required' => 'يجب ان توافق على الشروط '
            ];
    }
}
