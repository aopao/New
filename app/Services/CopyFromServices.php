<?php

namespace App\Services;

use App\Repositories\CopyFromRepository;

/**
 * Class CopyFromServices
 *
 * @package App\Services
 */
class CopyFromServices
{
    /**
     * @var $copyFromRepository
     */
    private $copyFromRepository;

    /**
     * CopyFromServices constructor.
     *
     * @param $copyFromRepository $copyFromRepository
     */
    public function __construct(CopyFromRepository $copyFromRepository)
    {
        $this->copyFromRepository = $copyFromRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->copyFromRepository->getAll()->toArray();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->copyFromRepository->getById($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        if ($this->copyFromRepository->store($data)) {
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

        if ($this->copyFromRepository->update($id, $data)) {
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
        if ($this->copyFromRepository->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }
}