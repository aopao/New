<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Service
 *
 * @property int                 $id
 * @property string              $title          服务标题
 * @property string              $subtitle       服务副标题
 * @property string              $desc           服务简介
 * @property string              $content        服务内容
 * @property string              $current_price  服务现价
 * @property string              $original_price 服务原价
 * @property string              $teacher        服务师资
 * @property string              $method         服务方式
 * @property string              $obj            服务对象
 * @property string              $thumb          服务图片
 * @property string              $status         服务状态
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereCurrentPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereObj($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereOriginalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereTeacher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    protected $fillable = ['title', 'subtitle', 'desc', 'thumb', 'current_price', 'original_price', 'teacher', 'method', 'obj', 'status', 'content'];
}
