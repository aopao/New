<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ConfigRequest;
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
     * @param int $statusCode
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
     * @param ConfigRequest $configRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ConfigRequest $configRequest)
    {
        if ($this->configServices->update($configRequest->all())) {
            return redirect()->back()->with("message", "修改成功");
        } else {
            return redirect()->back()->with("message", "修改失败");
        }
    }
}
