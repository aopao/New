<?php

namespace App\Http\Controllers\Admin;

use App\Services\CategoryServices;
use App\Services\ArticleServices;
use App\Http\Requests\ArticleRequest;
use App\Services\CopyFromServices;
use App\Services\UploadServices;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 *
 * @package App\Http\Controllers\Admin
 */
class ArticleController extends ApiController
{
    /**
     * @var \App\Services\ArticleServices
     */
    private $articleServices;

    /**
     * @var \App\Services\CategoryServices
     */
    private $categoryServices;

    /**
     * @var \App\Services\CopyFromServices
     */
    private $copyFromServices;

    /**
     * ArticleController constructor.
     *
     * @param \App\Services\ArticleServices $articleServices
     * @param \App\Services\CategoryServices $categoryServices
     * @param \App\Services\CopyFromServices $copyFromServices
     */
    public function __construct(ArticleServices $articleServices, CategoryServices $categoryServices, CopyFromServices $copyFromServices)
    {
        parent::__construct();
        $this->articleServices = $articleServices;
        $this->categoryServices = $categoryServices;
        $this->copyFromServices = $copyFromServices;
    }

    public function index()
    {
        return view('admin.article.index');
    }

    public function list(Request $request)
    {
        $count = $this->articleServices->getAllCount();
        $article_list = $this->articleServices->getAllByPage($request->all());

        return $this->responsePage($count, $article_list);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category_list = $this->categoryServices->getSingleTreeArray();
        $copy_from_list = $this->copyFromServices->getAll();

        return view('admin.article.create', compact('category_list', 'copy_from_list'));
    }

    /**
     * @param \App\Http\Requests\ArticleRequest $articleRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArticleRequest $articleRequest)
    {
        if ($this->articleServices->store($articleRequest->all())) {
            return redirect()->back()->with("message", "添加成功");
        } else {
            return redirect()->back()->with("message", "添加失败");
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {

        $data = $this->articleServices->upload($request);

        return $this->responseSuccess($data);
    }
}
