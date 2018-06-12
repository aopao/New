<?php

namespace App\Repositories;

use App\Models\PayRecord;

/**
 * Class PayRecordRepository
 *
 * @package App\Repositories
 */
class PayRecordRepository
{
	/**
	 * @var $payRecord
	 */
	private $payRecord;

	/**
	 * PayRecordRepository constructor.
	 *
	 * @param \App\Models\PayRecord $payRecord
	 */
	public function __construct(PayRecord $payRecord)
	{
		$this->payRecord = $payRecord;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getAllCount()
	{
		return
			$this->payRecord
				->join('users','pay_records.uid','=','users.id')
				->join('services','pay_records.sid','=','services.id')
				->where('users.is_admin','eq','0')
//				->where('users.status','eq','1')
//				->where('services.status','eq','1')
				->count();
	}
	public function getAllByPage($offset, $limit)
	{
		return
			$this->payRecord
				->join('users','pay_records.uid','=','users.id')
				->join('services','pay_records.sid','=','services.id')
				->where('users.is_admin','eq','0')
//				->where('users.status','eq','1')
//				->where('services.status','eq','1')
				->select(
					'users.mobile',
					'services.title',
					'services.current_price',
					'pay_records.*'
				)
				->skip($offset)
				->limit($limit)
				->orderBy('paytime', 'desc')
				->get();
	}



	
}