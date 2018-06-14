<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    protected $fillable = ['icon', 'display_name', 'url', 'desc', 'parent_id'];
}
