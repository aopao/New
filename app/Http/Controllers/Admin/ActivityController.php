<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ActivityRequest;
use App\Http\Requests\Request;
use App\Services\ActivityServices;


/**
 * Class ActivityController
 *
 * @package App\Http\Controllers\Admin
 */
class ActivityController extends ApiController
{
    /**
     * @var ActivityServices
     */
    private $activityServices;

    /**
     * ActivityController constructor.
     *
     * @param ActivityServices $activityServices
     */
    public function __construct(ActivityServices $activityServices)
    {
        parent::__construct();
        $this->activityServices = $activityServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.activity.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function activitylist(Request $request)
    {
        $count = $this->activityServices->getAllCount();
        $activity_list = $this->activityServices->getAllByPage($request->all());
        return $this->responsePage($count, $activity_list);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.activity.create');
    }

    /**
     * @param ActivityRequest $activityRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ActivityRequest $activityRequest)
    {

        if ($this->activityServices->store($activityRequest->all())) {
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
        $activity_info = $this->activityServices->getById($id);
        return view('admin.activity.edit', compact('activity_info'));
    }

    /**
     * @param \App\Http\Requests\ActivityRequest $activityRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ActivityRequest $activityRequest)
    {
        if ($this->activityServices->update($activityRequest->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }



    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {

        $data = $this->activityServices->upload('other_upload',$request);

        return $this->responseSuccess($data);
    }



    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $res = $this->activityServices->destroy($id);
        if ($res) {
            return $this->setStatusCode(200)->responseSuccess();
        } else {
            return $this->setStatusCode(401)->responseErrors();
        }
    }






}
