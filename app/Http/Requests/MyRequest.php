<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyRequest extends FormRequest
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
            'title'     => 'required',
            'content'   => 'required|min:10',
        ];
    }

    public function attributes()
    {
        return [
            'title' => '文章標題',
            'content'  => '文章內文',
        ];
    }

    public function messages()
    {
        return [
            'title.required'      => ':attribute 為必填',
            'content.required'    => ':attribute 為必填',
            'content.min'         => ':attribute 的欄位字數需超過 :min字元。',
        ];
    }
}
