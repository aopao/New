<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryServices;

/**
 * Class CategoryController
 *
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends ApiController
{
    /**
     * @var CategoryServices
     */
    private $categoryServices;

    /**
     * CategoryController constructor.
     *
     * @param CategoryServices $categoryServices
     */
    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $category_list = $this->categoryServices->getSingleListTreeArray();

        return $this->responseSuccess($category_list);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $category_list = $this->categoryServices->getSingleTreeArray();

        return view('admin.category.create', compact('category_list'));
    }

    /**
     * @param CategoryRequest $categoryRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $categoryRequest)
    {
        if ($this->categoryServices->store($categoryRequest->all())) {
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
        $category_list = $this->categoryServices->getSingleTreeArray();
        $category_info = $this->categoryServices->getById($id);

        return view('admin.category.edit', compact('category_list', 'category_info'));
    }

    /**
     * @param \App\Http\Requests\CategoryRequest $categoryRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryRequest $categoryRequest)
    {
        if ($this->categoryServices->update($categoryRequest->all())) {
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
        $res = $this->categoryServices->destroy($id);
        if ($res) {
            if (is_numeric($res) && $res >= 1) {
                return $this->setStatusCode(201)->responseSuccess();
            } else {
                return $this->setStatusCode(200)->responseSuccess();
            }
        } else {
            return $this->setStatusCode(401)->responseErrors();
        }
    }
}
