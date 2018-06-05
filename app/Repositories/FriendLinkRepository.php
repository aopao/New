<?php

namespace App\Repositories;

use App\Models\FriendLink;

/**
 * Class FriendLinkRepository
 *
 * @package App\Repositories
 */
class FriendLinkRepository
{
	/**
	 * @var $friendLink
	 */
	private $friendLink;

	/**
	 * FriendLinkRepository constructor.
	 *
	 * @param \App\Models\FriendLink $friendLink
	 */
	public function __construct(FriendLink $friendLink)
	{
		$this->friendLink = $friendLink;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->friendLink->all();
	}


	public function getAllCount()
	{
		return $this->friendLink->count();
	}
	public function getAllByPage($offset, $limit)
	{
		return $this->friendLink->skip($offset)->limit($limit)->orderBy('created_at', 'desc')->get();
	}



	/**
	 * @param $id
	 * @return mixed|static
	 */
	public function getById($id)
	{
		return $this->friendLink->find($id);
	}



	/**
	 * @param $array
	 * @return bool
	 */
	public function store($array)
	{
		return $this->friendLink->create($array);
	}



	/**
	 * @param $id
	 * @param $data
	 * @return bool
	 */
	public function update($id, $data)
	{
		return $this->friendLink->where('id', $id)->update($data);
	}


	/**
	 * @param $id
	 * @return int
	 */
	public function destroy($id)
	{
		return $this->friendLink->destroy($id);
	}


	
}