<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'streat' => 'required',
            'details'=>'max:255',
            'lat'=>'between:0,99.99999999',
            'long'=>'between:0,99.99999999',
            'user_id' => 'exists:app\Models\User,id',
            'city_id' => 'exists:app\Models\City,id',
            'governorate_id' => 'exists:app\Models\Governorate,id'
        ];
    }

    public function messages()
    {
        return [
            'streat.required' => 'يجب إدخال اسم الشارع',
            'details.max'=>'لقد تخطيت الحد المسموح به من الأحرف',
            'lat.between'=>'تأكد من ملئ الحقل بشكل صحيح',
            'long.between'=>'تأكد من ملئ الحقل بشكل صحيح',
            'user_id.exists'=>'المستخدم غير موجود',
            'city_id.exists'=>'المدينة غير موجودة',
            'governorate_id.exists'=>'المحافظة غير موجودة',
            ];
    }
}
