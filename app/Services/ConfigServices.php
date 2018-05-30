<?php

namespace App\Services;


use App\Repositories\ConfigRepository;

/**
 * Class ConfigRepository
 *
 * @package App\Services
 */
class ConfigServices
{
	/**
	 * @var configRepository
	 */
	private $configRepository;
	
	
	public function __construct(ConfigRepository $configRepository)
	{
		$this->configRepository = $configRepository;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->configRepository->getAll();
	}
	
	
}