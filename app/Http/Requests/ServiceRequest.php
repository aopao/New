<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ServiceRequest
 *
 * @package App\Http\Requests
 */
class ServiceRequest extends FormRequest
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
			'title' => 'required',
			'subtitle' => 'required',
			'desc' => 'required',
			'editorValue' => 'required',
			'current_price' => 'required|numeric',
			'original_price' => 'required|numeric',
			'teacher' => 'required',
			'method' => 'required',
			'obj' => 'required',
			'pic' => 'required',
		];
	}
	
	public function messages()
	{
		return [
			'title.required' => '请填写服务标题' ,
			'subtitle.required' => '请填写服务副标题' ,
			'desc.required' => '请填写服务简介' ,
			'editorValue.required' => '请填写服务内容' ,
			'current_price.required' => '请填写服务现价' ,
			'original_price.required' => '请填写服务原价' ,
			'current_price.numeric' => '现价必须是数字' ,
			'original_price.numeric' => '原价必须是数字' ,
			'teacher.required' => '请填写服务师资' ,
			'method.required' => '请填写服务方式' ,
			'obj.required' => '请填写服务对象' ,
			'pic.required' => '请上传服务图片' ,


		];
	}
	
}
