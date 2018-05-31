<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model
{
	protected $fillable = [ 'title' , 'pic' , 'url' , 'type' , 'seat' , 'status' ];
}
