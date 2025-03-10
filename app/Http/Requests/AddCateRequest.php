<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:vp_categories,cate_name',
        ];
    }
    public function messages()
    {
        return [
            'name.unique'=>'Tên danh mục đả bị trùng',
            'name.required'=>'nhập tên danh mục'
        ];
    
    }
}
