<?php

namespace App\Services;

use App\Http\Requests\Request;
use App\Repositories\OperationLogRepository;

/**
 * Class OperationLogServices
 *
 * @package App\Services
 */
class OperationLogServices
{
	/**
	 * @var $operationLogRepository
	 */
	private $operationLogRepository;
	
	
	/**
	 * OperationLogServices constructor.
	 *
	 * @param OperationLogRepository $operationLogRepository
	 */
	public function __construct(OperationLogRepository $operationLogRepository)
	{
		$this->operationLogRepository = $operationLogRepository;
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getAllCount()
	{
		return $this->operationLogRepository->getAllCount();
	}
	public function getAllByPage($data)
	{
		$page = $data['page'] - 1;
		$limit = $data['limit'];
		$offset = $page * $limit;
		return $this->operationLogRepository->getAllByPage($offset, $limit);
	}
	
	
}