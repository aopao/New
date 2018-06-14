<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EmailConfig
 *
 * @property int                 $id
 * @property string              $driver     邮件发送驱动
 * @property string              $host       邮件发送主机地址
 * @property string              $port       邮件发送端口
 * @property string              $username   邮件发送人邮箱地址
 * @property string              $password   邮件发送人邮箱授权码
 * @property string              $encryption 邮件加密方式
 * @property string              $fromaddr   邮件发送人邮箱地址
 * @property string              $fromname   邮件发送人昵称
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereDriver($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereEncryption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereFromaddr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereFromname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereHost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailConfig whereUsername($value)
 * @mixin \Eloquent
 */
class EmailConfig extends Model
{
    protected $fillable = ['driver', 'host', 'port', 'username', 'password', 'encryption', 'fromaddr', 'fromname'];
}
