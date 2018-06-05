<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FriendLinkRequest
 *
 * @package App\Http\Requests
 */
class FriendLinkRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return TRUE;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title' => 'required_without:pic',
			'pic' => 'required_without:title',
			'url' => 'required|url' ,
		];
	}
	
	public function messages()
	{
		return [
			'title.required_without' => '请填写链接内容' ,
			'pic.required_without' => '请选择链接图片' ,
			'url.required' => '请填写链接地址' ,
			'url.url' => '输入的链接地址不合法',
		];
	}
	
}
