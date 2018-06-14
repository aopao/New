<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ConfigRequest
 *
 * @package App\Http\Requests
 */
class ConfigRequest extends FormRequest
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
            'web_name' => 'required|min:1|max:100',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'web_name.required' => '用户名必须填写',
            'web_name.min' => '用户名最少一个字符',
        ];
    }
}
