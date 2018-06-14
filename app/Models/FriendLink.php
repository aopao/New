<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FriendLink
 *
 * @package App\Models
 * @property int                 $id
 * @property string|null         $title       友情链接标题
 * @property string|null         $thumb       友情链接图片地址
 * @property string              $url         友情链接地址
 * @property string              $type        友情链接类型区分0:图片,1:文字
 * @property string              $seat        友情链接展示位置
 * @property string              $expire_date 到期时间,默认为零,长期有效
 * @property string              $status      友情链接当前的状态0:关闭显示,1:显示
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereSeat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\FriendLink whereUrl($value)
 * @mixin \Eloquent
 */
class FriendLink extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'thumb', 'url', 'type', 'seat', 'expire_date', 'status'];
}
