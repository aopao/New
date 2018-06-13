<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ActivityRequest
 *
 * @package App\Http\Requests
 */
class ActivityRequest extends FormRequest
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
			'range' => 'required',
			'method' => 'required',
			'obj' => 'required',
			'thumb' => 'required',
		];
	}


	public function messages()
	{
		return [
			'title.required' => '请填写活动标题' ,
			'subtitle.required' => '请填写活动副标题' ,
			'desc.required' => '请填写活动简介' ,
			'editorValue.required' => '请填写活动内容' ,
			'range.required' => '请填写活动起止时间' ,
			'method.required' => '请填写活动方式' ,
			'obj.required' => '请填写活动对象' ,
			'thumb.required' => '请上传活动图片' ,


		];
	}
	
}
