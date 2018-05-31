<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
			'url' => 'required|url' ,

		];
	}
	
	public function messages()
	{
		return [
			'url.required' => '友情链接必须填写' ,
			'url.url' => '输入的友情链接地址不合法',

		];
	}
	
}
