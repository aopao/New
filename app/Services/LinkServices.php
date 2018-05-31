<?php

namespace App\Services;


use App\Repositories\LinkRepository;

/**
 * Class LinkServices
 *
 * @package App\Services
 */
class LinkServices
{
	/**
	 * @var linkRepository
	 */
	private $linkRepository;


	/**
	 * LinkServices constructor.
	 *
	 * @param LinkRepository $linkRepository
	 */
	public function __construct(LinkRepository $linkRepository)
	{
		$this->linkRepository = $linkRepository;
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAll()
	{
		return $this->linkRepository->getAll();
	}



	/**
	 * @param array $array
	 * @return bool
	 */
	public function update(array $array)
	{
		if(empty($array['title']) && empty($array['pic']))
		{
			return FALSE;
		}
		else
		{
			if ($this->linkRepository->update($array)) {
				return TRUE;
			} else {
				return FALSE;
			}
		}

	}


}