<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreOrderRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'name'=>['required'],
            'email'=>['required'],
            'phone'=>['required']
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'Tên thương hiệu không được để trống',
            'email.required'=>'Email không được để trống',
            'phone.required'=>'Số điện thoại không được để trống',
        ];
    }
}
