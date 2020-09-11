<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'content' => 'required|min:5',
            'category_id' => 'notIn:Chọn danh mục',
            'author_id' => 'notIn:Chọn tác giả',
            'description' => 'required|min:5|max:255',
            'status' => 'in:hoạt động,không hoạt động',
            'images.*' => 'max:2000|mimes:jpeg,jpg,png,gif',
            'images' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'images.*.mimes' => ':attribute sai định dang',
            'images.*.max' => ':attribute kích thước không được vượt quá 2MB',
            'name.max' => ':attribute không được lớn hơn :max',
            'content.min' => ':attribute không được nhỏ hơn :min',
            'images.required' => ':attribute không được để trống',
            'required' => ':attribute không được để trống',
            'in' => ':attribute chưa được chọn ',
            'not_in' => ':attribute chưa được chọn ',
            'min' => ':attribute không được nhỏ hơn :min',
            'max' => ':attribute không được lớn hơn :max',
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
            'category_id' => 'Danh mục',
            'images' => 'Hình ảnh',
            'status' => 'Trạng thái',
            'images.*' => 'Ảnh',
            'name' => 'Tên truyện',
            'content' => 'Nội dung',
            'author_id' => 'Tác giả',
            'description' => 'Phần mô tả',
        ];
    }
}
