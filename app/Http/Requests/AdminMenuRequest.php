<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class AdminMenuRequest
 *
 * @package App\Http\Requests
 */
class AdminMenuRequest extends FormRequest
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
            'display_name' => 'required',
            'url' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'display_name.required' => '菜单名称必须填写',
            'url.required' => '菜单地址必须填写',
        ];
    }
}
