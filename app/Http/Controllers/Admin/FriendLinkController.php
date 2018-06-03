<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FriendLinkRequest;
use App\Http\Requests\Request;
use App\Services\FriendLinkServices;

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
		if ($this->friendLinkServices->store($friendLinkRequest->all())) {
			$arr = array('code'=>1,'msg'=>'添加成功','icon'=>'6');
			return json_encode($arr);
		} else {
			$arr = array('code'=>0,'msg'=>'添加失败','icon'=>'5');
			return json_encode($arr);
		}
	}



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
			$arr = array('code'=>1,'msg'=>'修改成功','icon'=>'6');
			return json_encode($arr);
		} else {
			$arr = array('code'=>0,'msg'=>'修改失败','icon'=>'5');
			return json_encode($arr);
		}


	}


	public function upload(Request $request)
	{

		$filename = $this->friendLinkServices->upload('other_upload',$request);


		if(!$filename)
		{
			$arr = array('status'=>-1,'msg'=>'上传图片错误','url'=>''	);
			return json_encode($arr);//图片名称加保存路径
		}
		else
		{
			$arr = array('status'=>0,'msg'=>'上传成功','url'=>$filename['image_url']);
			return json_encode($arr);//图片名称加保存路径
		}

	}







	/**
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function destroy($id)
	{
		$res = $this->friendLinkServices->destroy($id);
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
