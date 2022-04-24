<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'pharmacy_id' => 'exists:app\Models\Pharmacy,id',
            'facebook'=>'required|url',
            'twitter'=>'url',
            'instagram'=>'url'
        ];
    }

    public function messages()
    {
        return [
            'pharmacy_id.exists'=>'الصيدلية غير موجودة',
            'name.required' => 'يجب إدخال بيانات التواصل',
            'facebook.required'=>'يجب ملئ هذا الحقل',
            'facebook.url'=>'تأكد من كتابة العنوان بشكل صحيح',
            'twitter.url'=>'تأكد من كتابة العنوان بشكل صحيح',
            'instagram.url'=>'تأكد من كتابة العنوان بشكل صحيح',
            ];
    }
}
