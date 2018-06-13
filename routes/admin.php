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
    Route::post('article/thumb/upload', 'ArticleController@upload')->name('admin.article.thumb.upload');
    Route::resource('article', 'ArticleController', ['as' => 'admin']);

    ##友情链接路由##
    Route::get('friendLink/friendLinklist' , 'FriendLinkController@friendLinklist')->name('admin.friendLink.friendLinklist');
    Route::resource('friendLink' , 'FriendLinkController' , [ 'as' => 'admin' ]);
    Route::post('friendLink/pic/upload' , 'FriendLinkController@upload')->name('admin.friendLink.pic.upload');


    ##服务管理路由##
    Route::get('service/list', 'ServiceController@servicelist')->name('admin.service.servicelist');
    Route::resource('service', 'ServiceController', ['as' => 'admin']);
    Route::post('service/pic/upload' , 'ServiceController@upload')->name('admin.service.pic.upload');


    ##用户管理路由##
    Route::get('user/list', 'UserController@userlist')->name('admin.user.userlist');
    Route::resource('user', 'UserController', ['as' => 'admin']);
    Route::post('user/avatar/upload' , 'UserController@upload')->name('admin.user.avatar.upload');


    ##购买记录路由##
    Route::get('payRecord/payRecordlist' , 'PayRecordController@payRecordlist')->name('admin.payRecord.payRecordlist');
    Route::resource('payRecord' , 'PayRecordController' , [ 'as' => 'admin' ]);


    ##邮件管理路由##

    ##邮箱配置路由##
    Route::get('emailConfig', 'EmailConfigController@index')->name('admin.emailConfig.index');
    Route::put('emailConfig/update', 'EmailConfigController@update')->name('admin.emailConfig.update');

    ##邮件列表路由##
    Route::get('email/list', 'EmailController@emaillist')->name('admin.email.list');
    Route::get('email/send', 'EmailController@send')->name('admin.email.send');
    Route::resource('email', 'EmailController', ['as' => 'admin']);


    ##管理员操作记录路由##
    Route::get('operationLog/operationLoglist' , 'OperationLogController@operationLoglist')->name('admin.operationLog.operationLoglist');
    Route::resource('operationLog' , 'OperationLogController' , [ 'as' => 'admin' ]);


    ##活动管理路由##
    Route::get('activity/list', 'ActivityController@activitylist')->name('admin.activity.activitylist');
    Route::resource('activity', 'ActivityController', ['as' => 'admin']);
    Route::post('activity/pic/upload' , 'ActivityController@upload')->name('admin.activity.pic.upload');


    ##报名记录路由##
    Route::get('actiRecord/actiRecordlist' , 'ActiRecordController@actiRecordlist')->name('admin.actiRecord.actiRecordlist');
    Route::resource('actiRecord' , 'ActiRecordController' , [ 'as' => 'admin' ]);

});
