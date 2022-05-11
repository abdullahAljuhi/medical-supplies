<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
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
            'end_date'=>'required|date',
            'start_date'=>'required|date',
            'image'=>'image',
            'link'=>'required|url'
            
        ];
    }
    public function messages()
    {
        return [
            'end_date.required'=>'    يجب ادخال تاريخ الانتهاء',
            'end_date.date'=>'الرجاء التأكد من كتابة التاريخ بشكل صحيح',
            'start_date.required'=>'عليك إدخال تارخ بدء عرض الإعلان',
            'start_date.date'=>'الرجاء التأكد من كتابة التاريخ بشكل صحيح',
            'image.image'=>'تأكد من صيغة الملف',
            'link.required'=>'الرجاء كتابة رابط الإعلان',
            'link.url'=>'تأكد من كتابة الرابط بشكل صحيح'
        ];
    }
}
