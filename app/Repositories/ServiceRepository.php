<?php

namespace App\Repositories;

use App\Models\Service;

/**
 * Class ServiceRepository
 *
 * @package App\Repositories
 */
class ServiceRepository
{
	/**
	 * @var Service
	 */
	private $service;
	
	/**
	 * ServiceRepository constructor.
	 *
	 * @param Service $service
	 */
	public function __construct(Service $service)
	{
		$this->service = $service;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->service->all();
	}

	public function getAllCount()
	{
		return $this->service->count();
	}
	public function getAllByPage($offset, $limit)
	{
		return $this->service->skip($offset)->limit($limit)->orderBy('created_at', 'desc')->get();
	}
	

	/**
	 * @param $id
	 * @return mixed|static
	 */
	public function getById($id)
	{
		return $this->service->find($id);
	}
	

	
	/**
	 * @param array $data
	 * @return $this|\Illuminate\Database\Eloquent\Model
	 */
	public function store(array $data)
	{
		return $this->service->create($data);
	}

	/**
	 * @param $id
	 * @param $data
	 * @return bool
	 */
	public function update($id , $data)
	{
		return $this->service->where('id' , $id)->update($data);
	}
	
	/**
	 * @param $id
	 * @return int
	 */
	public function destroy($id)
	{
		return $this->service->destroy($id);
	}
}