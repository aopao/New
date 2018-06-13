<?php

namespace App\Services;

use App\Http\Requests\Request;
use App\Repositories\ActiRecordRepository;

/**
 * Class ActiRecordServices
 *
 * @package App\Services
 */
class ActiRecordServices
{

	/**
	 * @var $actiRecordRepository
	 */
	private $actiRecordRepository;


	/**
	 * ActiRecordServices constructor.
	 *
	 * @param ActiRecordRepository $actiRecordRepository
	 */
	public function __construct(ActiRecordRepository $actiRecordRepository)
	{
		$this->actiRecordRepository = $actiRecordRepository;
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */

	public function getAllCount()
	{
		return $this->actiRecordRepository->getAllCount();
	}
	public function getAllByPage($data)
	{
		$page = $data['page'] - 1;
		$limit = $data['limit'];
		$offset = $page * $limit;
		return $this->actiRecordRepository->getAllByPage($offset, $limit);
	}
	
	
}