<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Request;
use App\Services\ActiRecordServices;

/**
 * Class ActiRecordController
 *
 * @package App\Http\Controllers\Admin
 */
class ActiRecordController extends ApiController
{
	/**
	 * @var actiRecordServices
	 */
	private $actiRecordServices;


	/**
	 * ActiRecordController constructor.
	 *
	 * @param int $statusCode
	 * @param ActiRecordServices $actiRecordServices
	 */
	public function __construct($statusCode = 200 , ActiRecordServices $actiRecordServices)
	{
		parent::__construct($statusCode);
		$this->actiRecordServices = $actiRecordServices;
	}
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.actiRecord.index');
	}


	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function actiRecordlist(Request $request)
	{

		$count = $this->actiRecordServices->getAllCount();
		$actiRecord_list = $this->actiRecordServices->getAllByPage($request->all());
		return $this->responsePage($count, $actiRecord_list);

	}



}
