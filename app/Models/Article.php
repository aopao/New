<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id', 'user_id', 'copyform_id', 'title', 'excerpt', 'thumb', 'content', 'views', 'is_top', 'is_remark', 'http_url', 'status'];
}
