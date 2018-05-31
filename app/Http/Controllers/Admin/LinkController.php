<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\LinkRequest;
use App\Services\LinkServices;

class LinkController extends ApiController
{
	private $linkServices;
	
	public function __construct(int $statusCode = 200 , LinkServices $linkServices)
	{
		parent::__construct($statusCode);
		$this->linkServices = $linkServices;
	}
	
	public function index()
	{
		$linkInfo = $this->linkServices->getSingleArrayInfo();
		return view('admin.link.index' , compact('linkInfo'));
	}
	
	public function update(LinkRequest $linkRequest)
	{
		if ($this->linkServices->update($linkRequest->all())) {
			return redirect()->back()->with("message" , "修改成功");
		} else {
			return redirect()->back()->with("message" , "修改失败");
		}
	}
}
