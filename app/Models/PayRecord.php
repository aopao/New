<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayRecord extends Model
{
    protected $fillable = [ 'uid' , 'sid' , 'price' , 'num' , 'paytime' ];
}
