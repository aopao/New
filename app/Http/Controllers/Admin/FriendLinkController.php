<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FriendLinkRequest;
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
    private $friendLinkServices;

    /**
     * FriendLinkController constructor.
     *
     * @param int $statusCode
     * @param FriendLinkServices $friendLinkServices
     */
    public function __construct(int $statusCode = 200, FriendLinkServices $friendLinkServices)
    {
        parent::__construct($statusCode);
        $this->friendLinkServices = $friendLinkServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $linkInfo = $this->friendLinkServices->getAll();

        return view('admin.friendLink.index', compact('linkInfo'));
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
}
