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
     * @return int
     */
    public function getAllCount()
    {
        return $this->friendLinkRepository->getAllCount();
    }

    /**
     * @param $data
     * @return \Illuminate\Support\Collection
     */
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
        if ($array['type'] == 0) {
            $array['title'] = $array['thumb_title'];
        }

        if ($array['expire_date'] == null) {
            $array['expire_date'] = 0;
        }
        if ($this->friendLinkRepository->store($array)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function update($data)
    {
        if ($data['type'] == 0) {
            $data['title'] = $data['thumb_title'];
        }

        if ($data['expire_date'] == null) {
            $data['expire_date'] = 0;
        }

        $id = $data['id'];
        unset($data['_token'], $data['_method'], $data['file'], $data['thumb_title']);

        if ($this->friendLinkRepository->update($id, $data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool|int
     */
    public function destroy($id)
    {
        if ($this->friendLinkRepository->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $disk
     * @param $request
     * @return array
     */
    public function upload($disk, $request)
    {
        $upload = new UploadServices();
        $res = $upload->updateImageStore($disk, $request);
        $thumb_url = '/upload/other/'.(string) $res;
        $data = ['thumb_url' => $thumb_url];

        return $data;
    }
}