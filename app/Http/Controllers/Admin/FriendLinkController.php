<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LinkRequest;
use App\Services\FriendLinkServices;

/**
 * Class FriendLinkController
 *
 * @package App\Http\Controllers\Admin
 */
class FriendLinkController extends ApiController
{
    /**
     * @var FriendLinkServices
     */
    private $linkServices;

    /**
     * FriendLinkController constructor.
     *
     * @param int $statusCode
     * @param FriendLinkServices $linkServices
     */
    public function __construct(int $statusCode = 200, FriendLinkServices $linkServices)
    {
        parent::__construct($statusCode);
        $this->linkServices = $linkServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $linkInfo = $this->linkServices->getAll();

        return view('admin.link.index', compact('linkInfo'));
    }

    /**
     * @param LinkRequest $linkRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LinkRequest $linkRequest)
    {
        if ($this->linkServices->update($linkRequest->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }
}
