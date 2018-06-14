<?php

namespace App\Services;

use App\Repositories\AdminMenuRepository;

/**
 * Class AdminMenuServices
 *
 * @package App\Services
 */
class AdminMenuServices
{
    /**
     * @var AdminMenuRepository
     */
    private $adminMenuRepository;

    /**
     * CategoryServices constructor.
     *
     * @param AdminMenuRepository $adminMenuRepository
     */
    public function __construct(AdminMenuRepository $adminMenuRepository)
    {
        $this->adminMenuRepository = $adminMenuRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->adminMenuRepository->getAll();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->adminMenuRepository->getById($id);
    }

    /**
     * @return array
     */
    public function getSingleTreeArray()
    {
        $tree = new TreeServices();
        $data = $this->adminMenuRepository->getAll()->toArray();
        if (count($data) > 0) {
            return $tree->makeTreeForHtml($data);
        }
    }

    /**
     * @return bool|array
     */
    public function getSingleListTreeArray()
    {
        $tree = new TreeServices();
        $data = $this->adminMenuRepository->getAll()->toArray();
        if (count($data) == 0) {
            return false;
        }
        $data = $tree->makeTreeForHtml($data);
        foreach ($data as &$value) {
            $value['display_name'] = str_repeat("├─ ", $value['level']).$value['display_name'];
        }

        return $data;
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        if ($this->adminMenuRepository->store($data)) {
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
        if ($data['parent_id'] == $data['id']) {
            unset($data['parent_id']);
        }
        unset($data['_token'], $data['_method']);

        if ($this->adminMenuRepository->update($id, $data)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return int
     */
    public function getSonNum($id)
    {
        $categorySon = $this->adminMenuRepository->getSonById($id);

        return count($categorySon);
    }

    /**
     * @param $id
     * @return bool|int
     */
    public function destroy($id)
    {
        $categorySon = $this->getSonNum($id);
        if ($categorySon > 0) {
            return $categorySon;
        }

        if ($this->adminMenuRepository->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }
}