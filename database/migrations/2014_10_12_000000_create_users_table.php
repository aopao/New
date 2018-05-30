<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users' , function(Blueprint $table) {
			$table->increments('id');
			$table->string('account')->nullable()->unique()->comment('也可用用户名登录,可不用');
			$table->string('mobile')->index()->unique();
			$table->string('password');
			$table->string('nickname')->nullable();
			$table->string('avatar')->nullable();
			$table->string('email')->nullable();
			$table->integer('qq')->nullable();
			$table->boolean('status')->default(1)->comment('账户状态0:禁封,1:正常');
			$table->boolean('is_admin')->default(0)->comment('是否是管理员');
			$table->string('register_ip')->nullable();
			$table->integer('login_number')->default(0);
			$table->string('last_login_ip')->nullable();
			$table->string('last_login_time')->nullable();
			$table->string('verify_token')->nullable()->comment('邮箱验证Token');
			$table->boolean('email_is_active')->default(0)->comment('邮箱是否已经验证,默认不认证');
			$table->rememberToken();
			$table->timestamps();
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}
}
