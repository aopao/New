<?php

namespace App\Services;

use App\Repositories\ServiceRepository;

/**
 * Class ServiceServices
 *
 * @package App\Services
 */
class ServiceServices
{
    /**
     * @var ServiceRepository
     */
    private $serviceRepository;

    /**
     * ServiceServices constructor.
     *
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->serviceRepository->getAll();
    }

    /**
     * @return int
     */
    public function getAllCount()
    {
        return $this->serviceRepository->getAllCount();
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

        return $this->serviceRepository->getAllByPage($offset, $limit);
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->serviceRepository->getById($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        $data['content'] = $data['editorValue'];
        unset($data['_token'], $data['file'], $data['editorValue']);
        if ($this->serviceRepository->store($data)) {
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

        $id = $data['id'];
        $data['content'] = $data['editorValue'];
        unset($data['_token'], $data['_method'], $data['file'], $data['editorValue']);
        if ($this->serviceRepository->update($id, $data)) {
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
        if ($this->serviceRepository->destroy($id)) {
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
        $image_url = '/upload/other/'.(string) $res;
        $data = ['image_url' => $image_url];

        return $data;
    }
}