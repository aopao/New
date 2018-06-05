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


	/**
	 * @param $id
	 * @return mixed|static
	 */
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
	 * @param $data
	 * @return bool
	 */
	public function update($data)
	{
		$id = $data['id'];
		unset($data['_token'], $data['_method'], $data['file']);
		if ($this->friendLinkRepository->update($id, $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	/**
	 * @param $id
	 * @return bool|int
	 */
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