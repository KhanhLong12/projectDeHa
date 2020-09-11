<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
            'name' => 'required|min:3|max:255|unique:authors',
            'thumbnail' => 'required|image|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'min' => ':attribute không được nhỏ hơn 3 ký tự',
            'max' => ':attribute không lớn hơn 255 ký tự',
            'unique' => ':attribute đã tồn tại',
            'image' => ':attribute sai định dạng',
            'image.*.max' => ':attribute kích thước không được lớn hơn 2MB',
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
            'name' => 'Tên tác giả',
            'thumbnail' => 'Ảnh',
        ];
    }
}
