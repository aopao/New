<?php

namespace App\Repositories;

use App\Models\Config;

/**
 * Class ConfigRepository
 *
 * @package App\Repositories
 */
class ConfigRepository
{
	/**
	 * @var config
	 */
	private $config;
	
	/**
	 * ConfigRepository constructor.
	 *
	 * @param $config $config
	 */
	public function __construct(Config $config)
	{
		$this->config = $config;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->config->all();
	}
	
	
	/**
	 * 根据字段名来更新系统配置
	 * @param $array
	 * @return bool
	 */
	public function updateByName($array)
	{
		$flag = TRUE;
		unset($array[ "_token" ]);
		foreach ($array as $key => $value) {
			$flag = $this->config->where("key" , $key)->update([ "value" => $value ]);
		}
		return $flag;
	}
	
}