<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'prodect'=>'required',
            'price'=>'required',
            'delivery'=>'required|numeric',
            'address'=>'required',
            'user_id'=>'required|exists:app\Models\User,id',
            'pharmcy_id'=>'required|exists:app\Models\Pharmcy,id'
        ];
    }
    public function messages()
    {
        return [
            'prodect.required' => 'يجب إدخال اسم المنتج',
            'price.required'=>'يجب إخال سعر المنتج',
            'delivery.required'=>'يجب إخال سعر المنتج',
            'delivery.numeric'=>'يجب ملئ الحقل بأرقام فقط',
            'address.required'=>'يجب كتابة العنوان',
            'user_id.required'=>'يجب تحديد المستخدم',
            'user_id.exists'=>'المستخدم غير موجود',
            'pharmcy_id.required'=>'يجب تحديد الصيدلية',
            'pharmcy_id.exists'=>'الصيدلية غير موجودة',
        ];
    }
    
}
