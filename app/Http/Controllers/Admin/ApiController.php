<?php

namespace App\Http\Controllers\Admin;

/**
 * Class ApiController
 *
 * @package App\Http\Controllers\Admin
 */
class ApiController extends BaseController
{
    /**
     * @var int
     */
    private $statusCode = 200;  // 默认返回码


    /**
     * ApiController constructor.
     *
     * @param $statusCode
     */
    public function __construct($statusCode = 200)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function response($data)
    {
        return response()->json($data);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseErrors($message = 'Not Found')
    {
        return $this->response([
            'code' => 0,
            'status_code' => $this->statusCode,
            'msg' => $message,
        ]);
    }

    /**
     * @param        $data
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = [], $message = 'Success')
    {
        return $this->response([
            'code' => 0,
            'status_code' => $this->statusCode,
            'msg' => $message,
            'data' => $data,
        ]);
    }

    /**
     * @param        $data
     * @param int $count
     * @return \Illuminate\Http\JsonResponse
     */
    public function responsePage($count = 0, $data = [])
    {
        return $this->response([
            'code' => 0,
            'status_code' => $this->statusCode,
            'msg' => '',
            'count' => $count,
            'data' => $data,
        ]);
    }
}