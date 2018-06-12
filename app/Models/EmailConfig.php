<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailConfig extends Model
{
	protected $fillable = [ 'driver' , 'host' , 'port' , 'username' , 'password', 'encryption' , 'fromaddr' , 'fromname' ];
}
