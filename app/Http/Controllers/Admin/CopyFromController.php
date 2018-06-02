<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CopyFromRequest;
use App\Repositories\CopyFromRepository;
use App\Services\ArticleServices;

class CopyFromController extends ApiController
{
    /**
     * @var $copyFromRepository
     */
    private $copyFromServices;

    /**
     * CopyFromController constructor.
     *
     * @param ArticleServices $copyFromServices
     */
    public function __construct(ArticleServices $copyFromServices)
    {
        parent::__construct();
        $this->copyFromServices = $copyFromServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.copyFrom.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function copyFromList()
    {
        $copy_from_list = $this->copyFromServices->getAll();

        return $this->responseSuccess($copy_from_list);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.copyFrom.create');
    }

    /**
     * @param CopyFromRequest $copyFromRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CopyFromRequest $copyFromRequest)
    {
        if ($this->copyFromServices->store($copyFromRequest->all())) {
            return redirect()->back()->with("message", "添加成功");
        } else {
            return redirect()->back()->with("message", "添加失败");
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $copy_from_info = $this->copyFromServices->getById($id);

        return view('admin.copyFrom.edit', compact('copy_from_info'));
    }

    /**
     * @param \App\Http\Requests\CopyFromRequest $copyFromRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CopyFromRequest $copyFromRequest)
    {
        if ($this->copyFromServices->update($copyFromRequest->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $res = $this->copyFromServices->destroy($id);
        if ($res) {
            return $this->setStatusCode(200)->responseSuccess();
        } else {
            return $this->setStatusCode(401)->responseErrors();
        }
    }
}
