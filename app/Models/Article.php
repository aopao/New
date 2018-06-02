<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id', 'user_id', 'copyform_id', 'title', 'excerpt', 'thumb', 'content', 'views', 'is_top', 'is_remark', 'http_url', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function copyFrom()
    {
        return $this->belongsTo(copyFrom::class, 'copyform_id');
    }
}
