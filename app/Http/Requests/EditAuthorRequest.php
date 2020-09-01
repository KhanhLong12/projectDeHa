<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAuthorRequest extends FormRequest
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
        // $id     = $this->id;
        // $thumb  = 'required|image|max:2000';
        // if (!empty($id)) {
        //     $thumb  = '';
        // }
        return [
            'name'           => 'required|min:3|max:255|unique:authors,name,'.$this->id,
            'thumbnail'      => 'image|max:2000'
        ];
    }

    public function messages()
    {
        return [
            'required'  => ':attribute khong duoc de trong',
            'min'       => ':attribute khong nho hon 3 ky tu',
            'max'       => ':attribute khong lon hon 255 ky tu',
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
            'name'      => 'Ten tac gia',
        ];
    }
}
