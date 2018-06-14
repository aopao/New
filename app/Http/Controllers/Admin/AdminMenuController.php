<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminMenuRequest;
use App\Services\AdminMenuServices;
use Illuminate\Http\Request;

class AdminMenuController extends ApiController
{
    /**
     * @var AdminMenuServices
     */
    private $adminMenuServices;

    /**
     * AdminMenuController constructor.
     *
     * @param AdminMenuServices $adminMenuServices
     */
    public function __construct(AdminMenuServices $adminMenuServices)
    {
        parent::__construct();
        $this->adminMenuServices = $adminMenuServices;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.adminMenu.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function menuList()
    {
        $memu_list = $this->adminMenuServices->getSingleListTreeArray();

        return $this->responseSuccess($memu_list);
    }

    public function create()
    {
        $admin_menu_list = $this->adminMenuServices->getSingleTreeArray();

        return view('admin.adminMenu.create', compact('admin_menu_list'));
    }

    /**
     * @param AdminMenuRequest $adminMenuRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminMenuRequest $adminMenuRequest)
    {
        if ($this->adminMenuServices->store($adminMenuRequest->all())) {
            return redirect()->back()->with("message", "添加成功");
        } else {
            return redirect()->back()->with("message", "添加失败");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $admin_menu_list = $this->adminMenuServices->getSingleTreeArray();
        $admin_menu_info = $this->adminMenuServices->getById($id);

        return view('admin.adminMenu.edit', compact('admin_menu_list', 'admin_menu_info'));
    }

    /**
     * @param \App\Http\Requests\AdminMenuRequest $adminMenuRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminMenuRequest $adminMenuRequest)
    {
        if ($this->adminMenuServices->update($adminMenuRequest->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }

    public function menuSort()
    {

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $res = $this->adminMenuServices->destroy($id);
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
