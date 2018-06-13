<?php

namespace App\Services;

use App\Http\Requests\Request;
use App\Repositories\ActivityRecordRepository;

/**
 * Class ActivityRecordServices
 *
 * @package App\Services
 */
class ActivityRecordServices
{

	/**
	 * @var $activityRecordRepository
	 */
	private $activityRecordRepository;


	/**
	 * ActivityRecordServices constructor.
	 *
	 * @param ActivityRecordRepository $activityRecordRepository
	 */
	public function __construct(ActivityRecordRepository $activityRecordRepository)
	{
		$this->activityRecordRepository = $activityRecordRepository;
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getAllCount()
	{
		return $this->activityRecordRepository->getAllCount();
	}
	public function getAllByPage($data)
	{
		$page = $data['page'] - 1;
		$limit = $data['limit'];
		$offset = $page * $limit;
		return $this->activityRecordRepository->getAllByPage($offset, $limit);
	}
	
	
}