<?php

namespace App\Repositories;

use App\Models\OperationLog;

/**
 * Class OperationLogRepository
 *
 * @package App\Repositories
 */
class OperationLogRepository
{
	/**
	 * @var $operationLog
	 */
	private $operationLog;

	/**
	 * OperationLogRepository constructor.
	 *
	 * @param \App\Models\OperationLog $operationLog
	 */
	public function __construct(OperationLog $operationLog)
	{
		$this->operationLog = $operationLog;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getAllCount()
	{
		return
			$this->operationLog
				->join('users','operation_logs.uid','=','users.id')
				->count();
	}
	public function getAllByPage($offset, $limit)
	{
		return
			$this->operationLog
				->join('users','operation_logs.uid','=','users.id')
				->select(
					'users.account',
					'users.mobile',
					'users.email',
					'operation_logs.*'
				)
				->skip($offset)
				->limit($limit)
				->orderBy('created_at', 'desc')
				->get();
	}



	
}