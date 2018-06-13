<?php

namespace App\Repositories;

use App\Models\ActiRecord;

/**
 * Class ActiRecordRepository
 *
 * @package App\Repositories
 */
class ActiRecordRepository
{
	/**
	 * @var $actiRecord
	 */
	private $actiRecord;

	/**
	 * ActiRecordRepository constructor.
	 *
	 * @param \App\Models\ActiRecord $actiRecord
	 */
	public function __construct(ActiRecord $actiRecord)
	{
		$this->actiRecord = $actiRecord;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getAllCount()
	{
		return
			$this->actiRecord
				->join('users','acti_records.uid','=','users.id')
				->join('activities','acti_records.aid','=','activities.id')
				->where('users.is_admin','eq','0')
				->count();
	}
	public function getAllByPage($offset, $limit)
	{
		return
			$this->actiRecord
				->join('users','acti_records.uid','=','users.id')
				->join('activities','acti_records.aid','=','activities.id')
				->where('users.is_admin','eq','0')
				->select(
					'users.mobile',
					'activities.title',
					'acti_records.*'
				)
				->skip($offset)
				->limit($limit)
				->orderBy('created_at', 'desc')
				->get();
	}



	
}