<?php

namespace App\Repositories;

use App\Models\Article;

/**
 * Class ArticleRepository
 *
 * @package App\Repositories
 */
class ArticleRepository
{
    /**
     * @var \App\Models\Article
     */
    private $articel;

    /**
     * ArticleRepository constructor.
     *
     * @param \App\Models\Article $articel
     */
    public function __construct(Article $articel)
    {
        $this->articel = $articel;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->articel->all();
    }

    public function getAllCount()
    {
        return $this->articel->count();
    }

    public function getAllByPage($offset, $limit)
    {
        return $this->articel->skip($offset)->limit($limit)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->articel->find($id);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->articel->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->articel->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->articel->destroy($id);
    }
}