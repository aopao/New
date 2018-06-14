<?php

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @var $user
     */
    private $user;

    /**
     * UserRepository constructor.
     *
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->user->where('is_admin', 0)->all();
    }

    /**
     * @return int
     */
    public function getAllCount()
    {
        return $this->user->where('is_admin', 0)->count();
    }

    /**
     * @param $offset
     * @param $limit
     * @return \Illuminate\Support\Collection
     */
    public function getAllByPage($offset, $limit)
    {
        return $this->user->where('is_admin', 0)
            ->skip($offset)->limit($limit)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->user->find($id);
    }

    /**
     * @param $array
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store($array)
    {
        return $this->user->create($array);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->user->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->user->destroy($id);
    }
}