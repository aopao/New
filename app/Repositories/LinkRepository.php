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
	 * 根据字段名来更新系统配置
	 * @param $array
	 * @return bool
	 */
	public function updateByName($array)
	{
		$flag = TRUE;
		foreach ($array as $item) {
			$flag = $this->link->where("id" , $item['id'])->update([ "title" => $item['title'],"pic" => $item['pic'],"url" => $item['url'],"type" => $item['type'],"seat" => $item['seat'],"status" => $item['status'], ]);
		}
		return $flag;
	}
	
}