<?php

namespace App\Services;

use App\Http\Requests\Request;
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

	public function getAllCount()
	{
		return $this->friendLinkRepository->getAllCount();
	}
	public function getAllByPage($data)
	{
		$page = $data['page'] - 1;
		$limit = $data['limit'];
		$offset = $page * $limit;
		return $this->friendLinkRepository->getAllByPage($offset, $limit);
	}



	public function getById($id)
	{
		return $this->friendLinkRepository->getById($id);
	}





	/**
	 * @param array $array
	 * @return bool
	 */
	public function store(array $array)
	{
		if ($this->friendLinkRepository->store($array)) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	/**
	 * @param array $array
	 * @return bool
	 */
	public function update(array $array)
	{
		foreach( $array as $k=>$v) {
			if($k == 'file') unset($array[$k]);
			if($k == '_token') unset($array[$k]);
			if($k == '_method') unset($array[$k]);
		}

		if ($this->friendLinkRepository->update($array)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}



	public function destroy($id)
	{
		if ($this->friendLinkRepository->destroy($id)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	public function upload($disk,$request)
	{
		$upload = new UploadServices();
		$res = $upload->updateImageStore($disk,$request);
		$image_url = '/upload/other/'.(string)$res;
		$data = ['image_url'=>$image_url];
		return $data;
	}







	

	
	
}