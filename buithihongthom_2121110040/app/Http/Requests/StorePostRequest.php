<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'name'=>['required'],
            'detail'=>['required'],
            'metakey'=>['required'],
            'metadesc'=>['required']
        ];
    }
    public function messages(): array
    {
        return [
            // 'name.required'=>'Tên sản phẩm không được để trống',
            'metakey.required'=>'Từ khóa không được để trống',
            'detail.required'=>'Từ khóa không được để trống',
            'metadesc.required'=>'Mô tả không được để trống',
        ];
    }
}
