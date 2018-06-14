<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Request;
use App\Services\PayRecordServices;

/**
 * Class PayRecordController
 *
 * @package App\Http\Controllers\Admin
 */
class PayRecordController extends ApiController
{
	/**
	 * @var payRecordServices
	 */
	private $payRecordServices;


	/**
	 * PayRecordController constructor.
	 *
	 * @param int $statusCode
	 * @param PayRecordServices $payRecordServices
	 */
	public function __construct($statusCode = 200 , PayRecordServices $payRecordServices)
	{
		parent::__construct($statusCode);
		$this->payRecordServices = $payRecordServices;
	}
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.payRecord.index');
	}

    /**
     * @param \App\Http\Requests\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function payRecordlist(Request $request)
	{

		$count = $this->payRecordServices->getAllCount();
		$payRecord_list = $this->payRecordServices->getAllByPage($request->all());
		return $this->responsePage($count, $payRecord_list);

	}



}
