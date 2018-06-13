<?php

namespace App\Repositories;

use App\Models\ActivityRecord;

/**
 * Class ActivityRecordRepository
 *
 * @package App\Repositories
 */
class ActivityRecordRepository
{
	/**
	 * @var $activityRecord
	 */
	private $activityRecord;

	/**
	 * ActivityRecordRepository constructor.
	 *
	 * @param \App\Models\ActivityRecord $activityRecord
	 */
	public function __construct(ActivityRecord $activityRecord)
	{
		$this->activityRecord = $activityRecord;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getAllCount()
	{
		return
			$this->activityRecord
				->join('users','activity_records.uid','=','users.id')
				->join('activities','activity_records.aid','=','activities.id')
				->where('users.is_admin','eq','0')
				->count();
	}
	public function getAllByPage($offset, $limit)
	{
		return
			$this->activityRecord
				->join('users','activity_records.uid','=','users.id')
				->join('activities','activity_records.aid','=','activities.id')
				->where('users.is_admin','eq','0')
				->select(
					'users.mobile',
					'activities.title',
					'activity_records.*'
				)
				->skip($offset)
				->limit($limit)
				->orderBy('created_at', 'desc')
				->get();
	}



	
}