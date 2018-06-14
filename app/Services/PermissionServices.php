<?php

namespace App\Services;

use App\Repositories\PermissionRepository;

/**
 * Class PermissionServices
 *
 * @package App\Services
 */
class PermissionServices
{
    /**
     * @var PermissionRepository
     */
    private $permissionRepository;

    /**
     * PermissionServices constructor.
     *
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->permissionRepository->getAll()->toArray();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->permissionRepository->getById($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        if ($data['name'] == '') {
            $data['name'] = str_replace('/', '.', $data['url']);
        }
        if ($this->permissionRepository->store($data)) {
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
        unset($data['_token'], $data['_method']);

        if ($this->permissionRepository->update($id, $data)) {
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
        if ($this->permissionRepository->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }
}