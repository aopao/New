<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CopyFrom
 *
 * @property int                 $id
 * @property string              $name
 * @property string              $desc
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CopyFrom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CopyFrom whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CopyFrom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CopyFrom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CopyFrom whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CopyFrom extends Model
{
    protected $fillable = ['name', 'desc'];
}
