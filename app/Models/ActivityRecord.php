<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ActivityRecord
 *
 * @mixin \Eloquent
 */
class ActivityRecord extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'activity_id'];

    /**
     *关联用户模型
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     *关联活动模型
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
