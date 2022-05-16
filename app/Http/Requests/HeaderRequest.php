<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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
            
            'image'=>'required|image',
            
        ];
    }

    public function messages()
    {
        return [
            'image.required'=>'يجب إدراج صورة',
            'image.image'=>'تأكد من صيغة الملف',
            
        ];
    }
}
