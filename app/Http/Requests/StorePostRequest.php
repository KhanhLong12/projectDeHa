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
            'name'         => 'required|min:3|max:255',
            'content'      => 'required|min:5',
            'category_id'  => 'notIn:Chon danh muc',
            'author_id'    => 'notIn:Chon tac gia',
            'description'  => 'required|min:5|max:255',
            'status'       => 'in:hoat dong,khong hoat dong',
            'images.*'     => 'max:2000|mimes:jpeg,jpg,png,gif',
            'images'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'images.*.mimes'        => ':attribute sai dinh dang',
            'images.*.max'          => ':attribute kich thuoc khong duoc vuot qua 2MB',
            'name.max'              => ':attribute khong duoc lon hon :max',    
            'content.min'           => ':attribute khong duoc nho hon :min',    
            'images.required'       => ':attribute khong duoc de trong',
            'required'              => ':attribute khong duoc de trong',
            'in'                    => ':attribute chua duoc chon ',
            'not_in'                => ':attribute chua duoc chon ',
            'min'                   => ':attribute khong duoc nho hon :min',
            'max'                   => ':attribute khong duoc lon hon :max',
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
            'category_id'   => 'Danh muc',
            'images'        => 'Hinh anh',
            'status'        => 'Trang thai',
            'images.*'      => 'Anh',
            'name'          => 'Ten truyen',
            'content'       => 'Noi dung',
            'author_id'     => 'Tac gia',
            'description'   => 'Phan mo ta',
        ];
    }
}
