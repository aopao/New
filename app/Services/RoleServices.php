<?php

namespace App\Services;

use App\Repositories\RoleRepository;

/**
 * Class RoleServices
 *
 * @package App\Services
 */
class RoleServices
{
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * RoleServices constructor.
     *
     * @param RoleRepository $roleRepository
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->roleRepository->getAll()->toArray();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->roleRepository->getById($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        if ($this->roleRepository->store($data)) {
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

        if ($this->roleRepository->update($id, $data)) {
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
        if ($this->roleRepository->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }
}