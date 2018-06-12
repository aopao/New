<?php

namespace App\Repositories;

use App\Models\Activity;

/**
 * Class ActivityRepository
 *
 * @package App\Repositories
 */
class ActivityRepository
{
	/**
	 * @var Activity
	 */
	private $activity;
	
	/**
	 * ActivityRepository constructor.
	 *
	 * @param Activity $activity
	 */
	public function __construct(Activity $activity)
	{
		$this->activity = $activity;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->activity->all();
	}

	public function getAllCount()
	{
		return $this->activity->count();
	}
	public function getAllByPage($offset, $limit)
	{
		return $this->activity->skip($offset)->limit($limit)->orderBy('created_at', 'desc')->get();
	}
	

	/**
	 * @param $id
	 * @return mixed|static
	 */
	public function getById($id)
	{
		return $this->activity->find($id);
	}
	

	
	/**
	 * @param array $data
	 * @return $this|\Illuminate\Database\Eloquent\Model
	 */
	public function store(array $data)
	{
		return $this->activity->create($data);
	}

	/**
	 * @param $id
	 * @param $data
	 * @return bool
	 */
	public function update($id , $data)
	{
		return $this->activity->where('id' , $id)->update($data);
	}
	
	/**
	 * @param $id
	 * @return int
	 */
	public function destroy($id)
	{
		return $this->activity->destroy($id);
	}
}