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
	
}