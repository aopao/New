<?php

namespace App\Repositories;

use App\Models\CopyFrom;

/**
 * Class CopyFromRepository
 *
 * @package App\Repositories
 */
class CopyFromRepository
{
    /**
     * @var \App\Models\CopyFrom
     */
    private $copyFrom;

    /**
     * CopyFromRepository constructor.
     *
     * @param \App\Models\CopyFrom $copyFrom
     */
    public function __construct(CopyFrom $copyFrom)
    {
        $this->copyFrom = $copyFrom;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->copyFrom->all();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->copyFrom->find($id);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->copyFrom->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->copyFrom->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->copyFrom->destroy($id);
    }
}