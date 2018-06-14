<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Article
 *
 * @property int                       $id
 * @property string                    $user_id
 * @property int                       $category_id
 * @property string                    $copyform_id 文章来源
 * @property string                    $title
 * @property string|null               $excerpt     文章摘要
 * @property string|null               $thumb       缩略图
 * @property string                    $content
 * @property int                       $views
 * @property int                       $is_top      是否置顶默认0,1:本分类置顶,2:全局置顶
 * @property int                       $is_remark   是否首页推荐默认0,1:推荐
 * @property string|null               $http_url    如果设置可直接跳转一个地址
 * @property string                    $status      文章当前的状态0:未发布,1:发布,-1:待审核
 * @property \Carbon\Carbon|null       $created_at
 * @property \Carbon\Carbon|null       $updated_at
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\CopyFrom $copyFrom
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCopyformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereExcerpt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereHttpUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereIsRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereIsTop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Article whereViews($value)
 * @mixin \Eloquent
 */
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
