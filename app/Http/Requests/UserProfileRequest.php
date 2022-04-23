<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
            'phone'=>'required|numeric',
            'birthday'=>'required|min(1900)',
            'image'=>'image',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=>'اكتب اسمك الكامل',
            'phone.required'=>'اكتب رقم هاتفك',
            'phone.numeric'=>'يجب كتابة أرقام فقط',
            'birthday.required'=>'يجب إخال سنة الميلاد',
            'birthday.min'=>'سنة الميلاد غير صالحة',
            'image.image'=>'الصيغة غير مدعومة تأكد من صيغة الملف',
        ];
    }
}
