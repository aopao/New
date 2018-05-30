<?php

namespace App\Repositories;

use App\Models\Config;

/**
 * Class ConfigRepository
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
	
	
}