<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|max:99',
            'password' => 'required|max:99|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'ادخل عنوان بريد إلكتروني بشكل صحيح.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'email.max'=>"حجم الايميل كبير جدا",
            'password.max'=>"حجم كلمة السر كبير جدا",
            'password.min'=>"حجم كلمة السر صغير جدا",
            'password.confirmed'=>"خطأ في تاكيد كلمة السر"
        ];
    }
}
