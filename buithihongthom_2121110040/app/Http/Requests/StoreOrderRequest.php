<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required'],
            'email'=>['required'],            
            'phone'=>['required'],            
            'address'=>['required'],            
            'note'=>['required'],   
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Tên thương hiệu không được để trống',
            'name.required'=>'Tên thương hiệu đã tồn tại',
            'eamil.required'=>'Email không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',
            'address.required'=>"Địa chỉ không được để trống",
            'note.required'=>"Nội dung không được để trống",
        ];
    }
}
