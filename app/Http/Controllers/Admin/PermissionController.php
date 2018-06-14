<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PermissonRequest;
use App\Services\PermissionServices;
use App\Services\RoleServices;

/**
 * Class PermissionController
 *
 * @package App\Http\Controllers\Admin
 */
class PermissionController extends ApiController
{
    /**
     * @var \App\Services\RoleServices
     */
    private $roleServices;

    /**
     * @var \App\Services\PermissionServices
     */
    private $permissionServices;

    /**
     * PermissionController constructor.
     *
     * @param \App\Services\PermissionServices $permissionServices
     * @param \App\Services\RoleServices       $roleServices
     */
    public function __construct(PermissionServices $permissionServices, RoleServices $roleServices)
    {
        parent::__construct();
        $this->roleServices = $roleServices;
        $this->permissionServices = $permissionServices;
    }

    /**
     * 显示权限列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->permissionServices->getAll();

        return view('admin.permission.index')->with('permissions', $permissions);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function permissionList()
    {
        $permission_list = $this->permissionServices->getAll();

        return $this->responseSuccess($permission_list);
    }

    /**
     * 显示创建权限表单
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roleServices->getAll(); // 获取所有角色

        return view('admin.permission.create')->with('roles', $roles);
    }

    /**
     * @param \App\Http\Requests\PermissonRequest $permissonRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissonRequest $permissonRequest)
    {
        if ($this->permissionServices->store($permissonRequest->all())) {
            return redirect()->back()->with("message", "添加成功");
        } else {
            return redirect()->back()->with("message", "添加失败");
        }
    }

    /**
     * 显示给定权限
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('permissions');
    }

    /**
     * 显示编辑权限表单
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = $this->permissionServices->getById($id);

        return view('admin.permission.edit', compact('permission'));
    }

    /**
     * @param \App\Http\Requests\PermissonRequest $permissonRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissonRequest $permissonRequest)
    {
        if ($this->permissionServices->update($permissonRequest->all())) {
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
        $res = $this->permissionServices->destroy($id);
        if ($res) {
            return $this->setStatusCode(200)->responseSuccess();
        } else {
            return $this->setStatusCode(401)->responseErrors();
        }
    }
}