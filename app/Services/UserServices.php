<?php

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * Class UserServices
 *
 * @package App\Services
 */
class UserServices
{
    /**
     * @var $userRepository
     */
    private $userRepository;

    /**
     * UserServices constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function getAllCount()
    {
        return $this->userRepository->getAllCount();
    }

    public function getAllByPage($data)
    {
        $page = $data['page'] - 1;
        $limit = $data['limit'];
        $offset = $page * $limit;

        return $this->userRepository->getAllByPage($offset, $limit);
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    /**
     * @param array $array
     * @return bool
     */
    public function store(array $array)
    {
        $array['password'] = bcrypt('888888');
        if ($this->userRepository->store($array)) {
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
        unset($data['_token'], $data['_method'], $data['file']);
        if ($this->userRepository->update($id, $data)) {
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
        if ($this->userRepository->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }

    public function upload($disk, $request)
    {
        $upload = new UploadServices();
        $res = $upload->updateImageStore($disk, $request);
        $image_url = '/upload/other/'.(string) $res;
        $data = ['image_url' => $image_url];

        return $data;
    }
}