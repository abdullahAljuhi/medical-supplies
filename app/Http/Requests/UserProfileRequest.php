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
            'user_id' => 'exists:app\Models\User,id',
            'name'=>'required',
            'phone'=>'required|numeric',
            'birthday'=>'required|date|after:01/01/1990|before:DateTime()',
            'image'=>'image',
            'address'=>'string',
        ];
    }
    public function messages()
    {
        return [
            'user_id.exists'=>'المستخدم غير موجود',
            'name.required'=>'اكتب اسمك الكامل',
            'phone.required'=>'اكتب رقم هاتفك',
            'phone.numeric'=>'يجب كتابة أرقام فقط',
            'birthday.required'=>'يجب إخال سنة الميلاد',
            'birthday.after'=>'تاريخ الميلاد غير صالح',
            'birthday.before'=>'تاريخ الميلاد غير صالح',
            'birthday.date'=>'تأكد من كتابة التاريخ بصيغة صحيحة',
            'image.image'=>'الصيغة غير مدعومة تأكد من صيغة الملف',
        ];
    }

}