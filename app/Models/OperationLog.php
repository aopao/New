<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationLog extends Model
{
    protected $fillable = [ 'uid' , 'path' , 'method' , 'ip' , 'sql' , 'input'];
}

