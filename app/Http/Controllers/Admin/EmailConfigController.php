<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EmailConfigRequest;
use App\Services\EmailConfigServices;

/**
 * Class EmailConfigController
 *
 * @package App\Http\Controllers\Admin
 */
class EmailConfigController extends ApiController
{
    /**
     * @var EmailConfigServices
     */
    private $emailConfigServices;

    /**
     * EmailConfigController constructor.
     *
     * @param EmailConfigServices $emailConfigServices
     */
    public function __construct(EmailConfigServices $emailConfigServices)
    {
        parent::__construct();
        $this->emailConfigServices = $emailConfigServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $emailConfigInfo = $this->emailConfigServices->getAll();
        return view('admin.emailConfig.index', compact('emailConfigInfo'));
    }

    /**
     * @param EmailConfigRequest $emailConfigRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmailConfigRequest $emailConfigRequest)
    {
        if ($this->emailConfigServices->update($emailConfigRequest->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }



}
