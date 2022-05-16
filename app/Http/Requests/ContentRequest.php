<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
                'titel'=>'required',
                'image'=>'required|image',
                'description'=>'required|max:255',
            
        ];
    }

    public function messages()
    {
        return [
            'titel.required'=>'يجب إضافة عنوان',
            'image.required'=>'يجب إدراج صورة',
            'image.image'=>'تأكد من صيغة الملف',
            'description.required'=>'أضف وصف للمحتوى',
            'description.max:255'=>'عدد الأحرف أكبر من المسموح بة',

        ];
    }
}
