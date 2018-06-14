<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Http\Requests\Request;
use App\Services\ServiceServices;

/**
 * Class ServiceController
 *
 * @package App\Http\Controllers\Admin
 */
class ServiceController extends ApiController
{
    /**
     * @var ServiceServices
     */
    private $serviceServices;

    /**
     * ServiceController constructor.
     *
     * @param ServiceServices $serviceServices
     */
    public function __construct(ServiceServices $serviceServices)
    {
        parent::__construct();
        $this->serviceServices = $serviceServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.service.index');
    }

    /**
     * @param \App\Http\Requests\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function servicelist(Request $request)
    {
        $count = $this->serviceServices->getAllCount();
        $service_list = $this->serviceServices->getAllByPage($request->all());
        return $this->responsePage($count, $service_list);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * @param ServiceRequest $serviceRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ServiceRequest $serviceRequest)
    {
        if ($this->serviceServices->store($serviceRequest->all())) {
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
        $service_info = $this->serviceServices->getById($id);
        return view('admin.service.edit', compact('service_info'));
    }

    /**
     * @param \App\Http\Requests\ServiceRequest $serviceRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ServiceRequest $serviceRequest)
    {
        if ($this->serviceServices->update($serviceRequest->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }

    /**
     * @param \App\Http\Requests\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {

        $data = $this->serviceServices->upload('other_upload',$request);

        return $this->responseSuccess($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $res = $this->serviceServices->destroy($id);
        if ($res) {
            return $this->setStatusCode(200)->responseSuccess();
        } else {
            return $this->setStatusCode(401)->responseErrors();
        }
    }

}
