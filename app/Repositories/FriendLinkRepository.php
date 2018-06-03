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
	 * 添加友情链接
	 *
	 * @param $array
	 * @return bool
	 */
	public function store($array)
	{
		return $this->friendLink->create($array);
	}



	/**
	 * 更新友情链接
	 *
	 * @param $array
	 * @return bool
	 */
	public function update($array)
	{
		return $this->friendLink->where("id" , $array[ 'id' ])->update($array);
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