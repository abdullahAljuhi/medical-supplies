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
            'user_id' => 'exists:app\Models\User,id|required',
            'email'=>'exists:app\Models\User,email|required|email| max:99',
            'password'=>'exists:app\Models\User,password|required|max:25|min:7|numbers|letter|symbol',
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
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'ادخل عنوان بريد إلكتروني بشكل صحيح.',
            'password.required' => 'كلمة المرور مطلوبة',
            'email.max'=>"حجم الايميل كبير جدا",
            'password.max'=>"حجم كلمة السر كبير جدا",
            'password.min'=>"حجم كلمة السر صغير جدا",
            'password.numbers'=>'كلمة المرور يجب أن تحوي على رقم واحد على الأقل',
            'password.letter'=>'كلمة المرور يجب أن تحوي حرف واحد على الأقل',
            'password.symbol'=>'كلمة المرور يجب أن تحوي رمز واحد على الأقل',
            'password.confirmed'=>"خطأ في تاكيد كلمة السر",
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