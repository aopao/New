<?php

namespace App\Services;


use App\Repositories\FriendLinkRepository;

/**
 * Class FriendLinkServices
 *
 * @package App\Services
 */
class FriendLinkServices
{
	/**
	 * @var $friendLinkRepository
	 */
	private $friendLinkRepository;
	
	
	/**
	 * FriendLinkServices constructor.
	 *
	 * @param FriendLinkRepository $friendLinkRepository
	 */
	public function __construct(FriendLinkRepository $friendLinkRepository)
	{
		$this->friendLinkRepository = $friendLinkRepository;
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->friendLinkRepository->getAll();
	}
	
	
	/**
	 * @param array $array
	 * @return bool
	 */
	public function update(array $array)
	{
		if (empty($array[ 'title' ]) && empty($array[ 'pic' ])) {
			return FALSE;
		} else {
			if ($this->friendLinkRepository->update($array)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}
		
	}
	
	
}