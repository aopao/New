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
	protected $fillable = [ 'title' , 'pic' , 'url' , 'type' , 'seat' , 'status' ];
}
