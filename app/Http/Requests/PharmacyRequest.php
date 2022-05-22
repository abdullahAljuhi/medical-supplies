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
            'pharmacy_name' => 'required|string',
            'mobile' => 'digits_between:6,15',
            'phone' => 'required|digits_between:6,15',            
            'image'=>'image',
            'city'=>'required',
            'governorate'=>'required',
            'street'=>'string|required',
            'details'=>'string|required',
        ];
    }

    public function messages()
    {
        return [
            'pharmacy_name.required' => 'يجب إدخال اسم الصيدلية',
            'city.required' => 'يجب إدخال اسم المحافظة',
            'street.string'=>'يجب ان يكون نص',
            'description.string'=>'يجب ان يكون نص',
            'street.required'=>'هذا الحقل مطلوب',
            'city.required' => 'يجب إدخال اسم المحافظة',
            'details.string'=>'يجب ان يكون نص',
            'details.required'=>'هذا الحقل مطلوب',
            'governorate.required' => 'يجب إدخال اسم المحافظة',
            'mobile.digits_between'=>' يجب ان يكون رقم بين 6  الى  15  ',
            'phone.digits_between'=>' يجب ان يكون رقم بين 6  الى  15  ',
            'mobile.digits_between'=>' يجب ان يكون رقم بين 6  الى  15  ',
            'phone.required'=>'يجب ملئ هذا الحقل برقم التلفون',
            'phone.digits_between'=>'    يجب ان يكون رقم بين 6  الى  15 ',
            'image.image'=>'الصيغة غير مدعومة تأكد من صيغة الملف',
            ];
    }
}
