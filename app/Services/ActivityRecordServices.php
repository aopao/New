<?php

namespace App\Services;

use App\Repositories\ActivityRecordRepository;

/**
 * Class ActivityRecordServices
 *
 * @package App\Services
 */
class ActivityRecordServices
{
    /**
     * @var $activityRecordRepository
     */
    private $activityRecordRepository;

    /**
     * ActivityRecordServices constructor.
     *
     * @param ActivityRecordRepository $activityRecordRepository
     */
    public function __construct(ActivityRecordRepository $activityRecordRepository)
    {
        $this->activityRecordRepository = $activityRecordRepository;
    }

    /**
     * @return int
     */
    public function getAllCount()
    {
        return $this->activityRecordRepository->getAllCount();
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

        return $this->activityRecordRepository->getAllByPage($offset, $limit);
    }
}