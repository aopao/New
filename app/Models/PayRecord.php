<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PayRecord
 *
 * @property int                 $id
 * @property int                 $uid     用户id
 * @property int                 $sid     服务id
 * @property float               $price   付款金额
 * @property int                 $num     商户单号
 * @property string              $paytime 付款时间
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord whereNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord wherePaytime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord whereSid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PayRecord whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PayRecord extends Model
{
    protected $fillable = ['uid', 'sid', 'price', 'num', 'paytime'];
}
