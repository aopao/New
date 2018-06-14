<?php

namespace App\Repositories;

use App\Models\AdminMenu;

/**
 * Class AdminMenuRepository
 *
 * @package App\Repositories
 */
class AdminMenuRepository
{
    /**
     * @var AdminMenu
     */
    private $adminMenu;

    /**
     * AdminMenuRepository constructor.
     *
     * @param AdminMenu $adminMenu
     */
    public function __construct(AdminMenu $adminMenu)
    {
        $this->adminMenu = $adminMenu;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->adminMenu->all();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTreeAll()
    {
        return $this->adminMenu->all();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->adminMenu->find($id);
    }

    /**
     * @param $id
     * @return CategoryRepository|mixed
     */
    public function getParentById($id)
    {
        return $this->getById($id);
    }

    /**
     * @param $id
     * @return array
     */
    public function getSonById($id)
    {
        return $this->adminMenu->where('parent_id', $id)->get()->toArray();
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->adminMenu->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->adminMenu->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->adminMenu->destroy($id);
    }
}