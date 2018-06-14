<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

/**
 * Class RoleRepository
 *
 * @package App\Repositories
 */
class RoleRepository
{
    /**
     * @var Role
     */
    private $role;

    /**
     * RoleRepository constructor.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->role->all();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->role->find($id);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->role->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->role->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->role->destroy($id);
    }
}