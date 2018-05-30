<?php
/**
 * 后台管理路由
 */

##获取管理后台路径前缀##
define('PREFIX' , config('admin.admin_prefix'));

##后台登录处理##
Route::namespace('Admin')->prefix(PREFIX)->group(function() {
	Route::get('/login' , 'LoginController@showLoginForm')->name('admin.login');
	Route::post('/login' , 'LoginController@login');
});

##后台具体业务路由##
Route::namespace('Admin')->prefix(PREFIX)->middleware('auth')->group(function() {
	##后台首页路由##
	Route::get('/' , 'DashboardController@index')->name('admin.dashboard.index');
	Route::get('dashboard' , 'DashboardController@index')->name('admin.dashboard.index');
	Route::get('dashboard/show' , 'DashboardController@show')->name('admin.dashboard.show');
});