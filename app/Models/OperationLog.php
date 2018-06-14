<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OperationLog
 *
 * @property int                 $id
 * @property string              $uid
 * @property string              $path
 * @property string              $method
 * @property string              $ip
 * @property string              $sql
 * @property string              $input
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereInput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereSql($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OperationLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OperationLog extends Model
{
    protected $fillable = ['uid', 'path', 'method', 'ip', 'sql', 'input'];
}

