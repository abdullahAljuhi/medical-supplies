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
            'name' => 'required',
            // 'mobile' => 'digits_between:6,11',
            // 'phone' => 'required|digits_between:6,11',
            // 'fax' => 'numeric|max:11',
            'license'=>'required',
            // 'image'=>'image',
            'accept'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب إدخال اسم الصيدلية',
            // 'mobile.numeric'=>'يجب كتابة أرقام فقط',
            // 'mobile.max'=>'تأكد من كتابة الرقم بشكل صحيح',
            // 'phone.required'=>'يجب ملئ هذا الحقل برقم التلفون',
            // 'phone.max'=>'تأكد من كتابة الرقم بشكل صحيح',
            // 'phone.numeric'=>'يجب كتابة أرقام فقط',
            // 'fax.numeric'=>'يجب كتابة أرقام فقط',
            // 'fax.max'=>'تأكد من كتابة الرقم بشكل صحيح',
            // 'image.image'=>'الصيغة غير مدعومة تأكد من صيغة الملف',
            'license.required'=>'عليك إدخال الترخيص',
            'accept.required' => 'يجب ان توافق على الشروط '
            ];
    }
}
