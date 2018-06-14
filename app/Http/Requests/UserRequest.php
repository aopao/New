<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FriendLinkRequest
 *
 * @package App\Http\Requests
 */
class UserRequest extends FormRequest
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
            'email' => 'nullable|email|unique:users',
            'qq' => 'nullable|numeric|regex:/^[0-9]{6,}$/',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => '输入的邮箱格式不合法',
            'qq.numeric' => '输入的QQ号格式不合法',
            'qq.regex' => '输入的QQ号格式不合法',
        ];
    }
}
