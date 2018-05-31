<?php

namespace App\Repositories;

use App\Models\Link;

/**
 * Class LinkRepository
 *
 * @package App\Repositories
 */
class LinkRepository
{
	/**
	 * @var link
	 */
	private $link;

	/**
	 * LinkRepository constructor.
	 *
	 * @param $link $link
	 */
	public function __construct(Link $link)
	{
		$this->link = $link;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->link->all();
	}


	/**
	 * 更新友情链接
	 * @param $array
	 * @return bool
	 */
	public function update($array)
	{
		$flag = $this->link->where("id" , $array['id'])->update([ "title" => $array['title'],"pic" => $array['pic'],"url" => $array['url'],"type" => $array['type'],"seat" => $array['seat'],"status" => $array['status'], ]);
		return $flag;
	}

}