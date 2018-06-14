<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\ConfigServices;

/**
 * Class ConfigController
 *
 * @package App\Http\Controllers\Admin
 */
class ConfigController extends ApiController
{
    /**
     * @var ConfigServices
     */
    private $configServices;

    /**
     * ConfigController constructor.
     *
     * @param int            $statusCode
     * @param ConfigServices $configServices
     */
    public function __construct(int $statusCode = 200, ConfigServices $configServices)
    {
        parent::__construct($statusCode);
        $this->configServices = $configServices;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $configInfo = $this->configServices->getSingleArrayInfo();

        return view('admin.config.index', compact('configInfo'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function email()
    {
        $configInfo = $this->configServices->getSingleArrayInfo();

        return view('admin.config.email', compact('configInfo'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if ($this->configServices->update($request->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }
}
