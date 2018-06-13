<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FriendLink
 *
 * @package App\Models
 */
class FriendLink extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'thumb', 'url', 'type', 'seat', 'expire_date', 'status'];
}
