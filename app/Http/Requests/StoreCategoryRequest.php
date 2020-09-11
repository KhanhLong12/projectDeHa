<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckEventRule;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required',
                'min:3',
                'max:255',
                'unique:categories',
            ],
            'display' => 'in:có,không',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn 3',
            'max' => ':attribute không lớn hơn 255 ký tự',
            'in' => ':attribute chưa được chọn',
            'unique' => ':attribute đã tồn tại',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */

    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'display' => 'Hiển thị danh mục',
        ];
    }
}
