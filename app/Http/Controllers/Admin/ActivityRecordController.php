<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Request;
use App\Services\ActivityRecordServices;

/**
 * Class ActivityRecordController
 *
 * @package App\Http\Controllers\Admin
 */
class ActivityRecordController extends ApiController
{
	/**
	 * @var activityRecordServices
	 */
	private $activityRecordServices;


	/**
	 * ActivityRecordController constructor.
	 *
	 * @param int $statusCode
	 * @param ActivityRecordServices $activityRecordServices
	 */
	public function __construct($statusCode = 200 , ActivityRecordServices $activityRecordServices)
	{
		parent::__construct($statusCode);
		$this->activityRecordServices = $activityRecordServices;
	}
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.activityRecord.index');
	}

    /**
     * @param \App\Http\Requests\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function activityRecordlist(Request $request)
	{

		$count = $this->activityRecordServices->getAllCount();
		$activityRecord_list = $this->activityRecordServices->getAllByPage($request->all());
		return $this->responsePage($count, $activityRecord_list);

	}



}
