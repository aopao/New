<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

/**
 * Class ArticleServices
 *
 * @package App\Services
 */
class ArticleServices
{
    /**
     * @var $articleRepository
     */
    private $articleRepository;

    /**
     * ArticleServices constructor.
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->articleRepository->getAll()->toArray();
    }

    public function getAllCount()
    {
        return $this->articleRepository->getAllCount();
    }

    public function getAllByPage($data)
    {
        $page = $data['page'] - 1;
        $limit = $data['limit'];
        $offset = $page * $limit;

        return $this->articleRepository->getAllByPage($offset, $limit);
    }

    /**
     * @param $id
     * @return mixed|static
     */
    public function getById($id)
    {
        return $this->articleRepository->getById($id);
    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
        if ($data['is_http_url'] == 0) {
            $data['content'] = $data['editorValue'];
        } else {
            $data['content'] = '';
        }
        if ($this->articleRepository->store($data)) {
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

        if ($this->articleRepository->update($id, $data)) {
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
        if ($this->articleRepository->destroy($id)) {
            return true;
        } else {
            return false;
        }
    }

    public function upload($request)
    {

        $upload = new UploadServices();
        $res = $upload->updateImageStore('article_upload', $request);
        $image_url = '/upload/article/'.(string) $res;
        $data = ['image_url' => $image_url];

        return $data;
    }
}