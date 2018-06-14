<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Request;
use App\Services\OperationLogServices;

/**
 * Class OperationLogController
 *
 * @package App\Http\Controllers\Admin
 */
class OperationLogController extends ApiController
{
	/**
	 * @var operationLogServices
	 */
	private $operationLogServices;

	
	/**
	 * OperationLogController constructor.
	 *
	 * @param int                $statusCode
	 * @param OperationLogServices $operationLogServices
	 */
	public function __construct($statusCode = 200 , OperationLogServices $operationLogServices)
	{
		parent::__construct($statusCode);
		$this->operationLogServices = $operationLogServices;
	}
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.operationLog.index');
	}

    /**
     * @param \App\Http\Requests\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function operationLoglist(Request $request)
	{

		$count = $this->operationLogServices->getAllCount();
		$operationLog_list = $this->operationLogServices->getAllByPage($request->all());
		return $this->responsePage($count, $operationLog_list);

	}



}
