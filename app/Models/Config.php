<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
	protected $fillable = [ 'web_name' , 'web_url' , 'seo_index' , 'seo_keywords' , 'seo_description' , 'analyze_code' , 'copyright' ];
}
