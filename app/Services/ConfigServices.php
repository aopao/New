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
	
	
	/**
	 * ConfigServices constructor.
	 *
	 * @param ConfigRepository $configRepository
	 */
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
	
	/**
	 * @return array
	 */
	public function getSingleArrayInfo()
	{
		$data = $this->getAll();
		$info = [];
		foreach ($data as $value) {
			$info[ $value[ 'key' ] ] = $value[ 'value' ];
		}
		return $info;
	}
	
	
	/**
	 * @param array $array
	 * @return bool
	 */
	public function update(array $array)
	{
		if ($this->configRepository->updateByName($array)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	
}