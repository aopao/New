<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FriendLinkRequest;
use App\Http\Requests\Request;
use App\Services\FriendLinkServices;
use App\Services\UploadServices;
use Illuminate\Support\Facades\View;

/**
 * Class FriendLinkController
 *
 * @package App\Http\Controllers\Admin
 */
class FriendLinkController extends ApiController
{
	/**
	 * @var friendLinkServices
	 */
	private $friendLinkServices;

	
	/**
	 * FriendLinkController constructor.
	 *
	 * @param int                $statusCode
	 * @param FriendLinkServices $friendLinkServices
	 */
	public function __construct($statusCode = 200 , FriendLinkServices $friendLinkServices)
	{
		parent::__construct($statusCode);
		$this->friendLinkServices = $friendLinkServices;
	}
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('admin.friendLink.index');
	}


	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function friendLinklist(Request $request)
	{

		$count = $this->friendLinkServices->getAllCount();
		$friendLink_list = $this->friendLinkServices->getAllByPage($request->all());
		return $this->responsePage($count, $friendLink_list);

	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.friendLink.create');
	}


	/**
	 * @param FriendLinkRequest $friendLinkRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(FriendLinkRequest $friendLinkRequest)
	{
//		dd($friendLinkRequest->all());
		if ($this->friendLinkServices->store($friendLinkRequest->all())) {
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
		$friendLink_info = $this->friendLinkServices->getById($id);
		return view('admin.friendLink.edit' , compact( 'friendLink_info'));
	}


	
	/**
	 * @param FriendLinkRequest $friendLinkRequest
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(FriendLinkRequest $friendLinkRequest)
	{

		if ($this->friendLinkServices->update($friendLinkRequest->all())) {
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

        $data = $this->friendLinkServices->upload('other_upload',$request);

        return $this->responseSuccess($data);
    }



	/**
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy($id)
	{
		$res = $this->friendLinkServices->destroy($id);
		if ($res) {
			return $this->setStatusCode(200)->responseSuccess();
		} else {
			return $this->setStatusCode(401)->responseErrors();
		}
	}










}
