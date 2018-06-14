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
    protected $fillable = ['uid', 'aid', 'created_at'];
}
