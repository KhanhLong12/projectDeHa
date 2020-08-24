<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'      => 'required|min:3|max:255|unique:categories',
            'display'   => 'in:co,khong',
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute khong duoc de trong',
            'min'       => ':attribute khong nho hon 3 ky tu',
            'max'       => ':attribute khong lon hon 255 ky tu',
            'in'        => ':attribute chua duoc chon',
            'unique'    => ':attribute da ton tai',
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
            'name'      => 'Ten danh muc',
            'display'   => 'Hien thi danh muc',
        ];
    }
}
