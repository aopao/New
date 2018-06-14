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
    private $article;

    /**
     * ArticleRepository constructor.
     *
     * @param \App\Models\Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->article->all();
    }

    /**
     * @return int
     */
    public function getAllCount()
    {
        return $this->article->count();
    }

    /**
     * @param $offset
     * @param $limit
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getAllByPage($offset, $limit)
    {
        return $this->article->with('category', 'copyFrom')->skip($offset)->limit($limit)->orderBy('created_at', 'desc')->get();
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->article->find($id);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->article->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return bool
     */
    public function update($id, $data)
    {
        return $this->article->where('id', $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return $this->article->destroy($id);
    }
}