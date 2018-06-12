<?php

namespace App\Services;

use App\Repositories\ActivityRepository;

/**
 * Class ActivityServices
 *
 * @package App\Services
 */
class ActivityServices
{
    /**
     * @var ActivityRepository
     */
    private $activityRepository;

    /**
     * ActivityServices constructor.
     *
     * @param ActivityRepository $activityRepository
     */
    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->activityRepository->getAll();
    }

    public function getAllCount()
    {
        return $this->activityRepository->getAllCount();
    }
    public function getAllByPage($data)
    {
        $page = $data['page'] - 1;
        $limit = $data['limit'];
        $offset = $page * $limit;
        return $this->activityRepository->getAllByPage($offset, $limit);
    }

    public function getById($id)
    {
        return  $this->activityRepository->getById($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        $data['content'] = $data['editorValue'];
        unset($data['_token'], $data['file'], $data['editorValue']);
        if ($this->activityRepository->store($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {

        $id = $data['id'];
        $data['content'] = $data['editorValue'];
        unset($data['_token'], $data['_method'], $data['file'], $data['editorValue']);
        if ($this->activityRepository->update($id, $data)) {
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
        if ($this->activityRepository->destroy($id)) {
            return true;
        } else {
            return false;
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