<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\Request;
use App\Services\EmailServices;


/**
 * Class EmailController
 *
 * @package App\Http\Controllers\Admin
 */
class EmailController extends ApiController
{
    /**
     * @var EmailServices
     */
    private $emailServices;

    /**
     * EmailController constructor.
     *
     * @param EmailServices $emailServices
     */
    public function __construct(EmailServices $emailServices)
    {
        parent::__construct();
        $this->emailServices = $emailServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.email.index');
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function emaillist(Request $request)
    {
        $count = $this->emailServices->getAllCount();
        $email_list = $this->emailServices->getAllByPage($request->all());
        return $this->responsePage($count, $email_list);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function send()
    {
        $uid_list = $this->emailServices->getUidList();
        return view('admin.email.send', compact('uid_list'));
    }

    /**
     * @param EmailRequest $emailRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmailRequest $emailRequest)
    {

//        dd($this->emailServices->store($emailRequest->all()));die;
        if ($this->emailServices->store($emailRequest->all())) {
            return redirect()->back()->with("message", "发送成功");
        } else {
            return redirect()->back()->with("message", "发送失败");
        }


    }




}
