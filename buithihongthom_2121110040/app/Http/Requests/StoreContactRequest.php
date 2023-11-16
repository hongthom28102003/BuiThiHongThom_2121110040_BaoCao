<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name'=>['required', 'unique::2121110040_contact'],
            'email'=>['required'],            
            'phone'=>['required'],            
            'title'=>['required'],            
            'content'=>['required'],            
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Tên thương hiệu không được để trống',
            'name.required'=>'Tên thương hiệu đã tồn tại',
            'eamil.required'=>'Email không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',
            'title.required'=>"Tiêu đề không được để trống",
            'content.required'=>"Nội dung không được để trống",
        ];
    }
}
