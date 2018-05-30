<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ConfigRequest;
use App\Services\ConfigServices;

class ConfigController extends ApiController
{
	private $configServices;
	
	public function __construct(int $statusCode = 200 , ConfigServices $configServices)
	{
		parent::__construct($statusCode);
		$this->configServices = $configServices;
	}
	
	public function index()
	{
		$configInfo = $this->configServices->getSingleArrayInfo();
		return view('admin.config.index' , compact('configInfo'));
	}
	
	public function update(ConfigRequest $configRequest)
	{
		if ($this->configServices->update($configRequest->all())) {
			return redirect()->back()->with("message" , "修改成功");
		} else {
			return redirect()->back()->with("message" , "修改失败");
		}
	}
}
