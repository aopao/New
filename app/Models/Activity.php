<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Activity
 *
 * @property int                 $id
 * @property string              $title    活动标题
 * @property string              $subtitle 活动副标题
 * @property string              $desc     活动简介
 * @property string              $content  活动内容
 * @property string              $range    活动起止时间
 * @property string              $method   活动方式
 * @property string              $obj      活动对象
 * @property string              $thumb    活动图片
 * @property string              $status   活动状态
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereObj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Activity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Activity extends Model
{
    protected $fillable = ['title', 'subtitle', 'desc', 'thumb', 'range', 'method', 'obj', 'status', 'content'];
}
