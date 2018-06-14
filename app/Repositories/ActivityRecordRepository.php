<?php

namespace App\Repositories;

use App\Models\ActivityRecord;

/**
 * Class ActivityRecordRepository
 *
 * @package App\Repositories
 */
class ActivityRecordRepository
{
    /**
     * @var $activityRecord
     */
    private $activityRecord;

    /**
     * ActivityRecordRepository constructor.
     *
     * @param \App\Models\ActivityRecord $activityRecord
     */
    public function __construct(ActivityRecord $activityRecord)
    {
        $this->activityRecord = $activityRecord;
    }

    /**
     * @return int
     */
    public function getAllCount()
    {
        return $this->activityRecord->count();
    }

    /**
     * @param $offset
     * @param $limit
     * @return \Illuminate\Support\Collection
     */
    public function getAllByPage($offset, $limit)
    {
        return $this->activityRecord->skip($offset)
            ->limit($limit)
            ->orderBy('created_at', 'desc')
            ->with('user', 'activity')
            ->get();
    }
}