<?php

namespace App\Services;

use App\Repositories\PayRecordRepository;

/**
 * Class PayRecordServices
 *
 * @package App\Services
 */
class PayRecordServices
{
    /**
     * @var $payRecordRepository
     */
    private $payRecordRepository;

    /**
     * PayRecordServices constructor.
     *
     * @param PayRecordRepository $payRecordRepository
     */
    public function __construct(PayRecordRepository $payRecordRepository)
    {
        $this->payRecordRepository = $payRecordRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */

    public function getAllCount()
    {
        return $this->payRecordRepository->getAllCount();
    }

    /**
     * @param $data
     * @return \Illuminate\Support\Collection
     */
    public function getAllByPage($data)
    {
        $page = $data['page'] - 1;
        $limit = $data['limit'];
        $offset = $page * $limit;

        return $this->payRecordRepository->getAllByPage($offset, $limit);
    }
}