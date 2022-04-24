<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name' => 'required',
            'governorate_id' => 'exists:app\Models\Governorate,id'
        
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب إدخال اسم المدينة',
            'governorate_id.exists'=>'المحافظة غير موجودة'
            ];
    }
}
