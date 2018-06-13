<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Http\Requests\Request;
use App\Services\UserServices;
use App\Services\UploadServices;
use Illuminate\Support\Facades\View;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Admin
 */
class UserController extends ApiController
{
	/**
	 * @var userServices
	 */
	private $userServices;

	
	/**
	 * UserController constructor.
	 *
	 * @param int                $statusCode
	 * @param UserServices $userServices
	 */
	public function __construct($statusCode = 200 , UserServices $userServices)
	{
		parent::__construct($statusCode);
		$this->userServices = $userServices;
	}
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.user.index');
	}


	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function userlist(Request $request)
	{

		$count = $this->userServices->getAllCount();
		$user_list = $this->userServices->getAllByPage($request->all());
		return $this->responsePage($count, $user_list);

	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.user.create');
	}


	/**
	 * @param UserRequest $userRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(UserRequest $userRequest)
	{
//		dd($friendLinkRequest->all());
		if ($this->userServices->store($userRequest->all())) {
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
		$user_info = $this->userServices->getById($id);
		return view('admin.user.edit' , compact( 'user_info'));
	}


	
	/**
	 * @param UserRequest $userRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(UserRequest $userRequest)
	{

		if ($this->userServices->update($userRequest->all())) {
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

        $data = $this->userServices->upload('other_upload',$request);

        return $this->responseSuccess($data);
    }



	/**
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy($id)
	{
		$res = $this->userServices->destroy($id);
		if ($res) {
			return $this->setStatusCode(200)->responseSuccess();
		} else {
			return $this->setStatusCode(401)->responseErrors();
		}
	}










}
