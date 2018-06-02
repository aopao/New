<?php
/**
 * 后台管理路由
 */

##获取管理后台路径前缀##
define('PREFIX', config('admin.admin_prefix'));

##后台登录处理##
Route::namespace('Admin')->prefix(PREFIX)->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login');
});

##后台具体业务路由##
Route::namespace('Admin')->prefix(PREFIX)->middleware('auth')->group(function () {
    ##后台首页路由##
    Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard.index');
    Route::get('dashboard/show', 'DashboardController@show')->name('admin.dashboard.show');

    ##后台设置路由##
    Route::get('config', 'ConfigController@index')->name('admin.config.index');
    Route::post('config/update', 'ConfigController@update')->name('admin.config.update');

    ##文章分类路由##
    Route::get('category/list', 'CategoryController@categoryList')->name('admin.category.list');
    Route::resource('category', 'CategoryController', ['as' => 'admin']);

    ##文章来源路由##
    Route::get('copy_from/list', 'CopyFromController@copyFromList')->name('admin.copy_from.list');
    Route::resource('copy_from', 'CopyFromController', ['as' => 'admin']);

    ##文章路由##
    Route::get('article/list', 'ArticleController@list')->name('admin.article.list');
    Route::post('article/thumb/upload', 'ArticleController@upload')->name('admin.article..thumb.upload');
    Route::resource('article', 'ArticleController', ['as' => 'admin']);

    ##友情链接路由##
    Route::resource('link', 'FriendLinkController', ['as' => 'admin']);
});
