<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendLinksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('friend_links' , function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->nullable()->comment('友情链接标题');
			$table->string('pic')->nullable()->comment('友情链接图片地址');
			$table->string('url')->comment('友情链接地址');
			$table->string('type')->default(1)->comment('友情链接类型区分0:图片,1:文字');
			$table->string('seat')->nullable()->comment('友情链接展示位置');
			$table->string('expire_date')->nullable()->comment('到期时间,默认为零,长期有效');
			$table->string('status')->default(1)->comment('友情链接当前的状态0:关闭显示,1:显示');
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
		Schema::dropIfExists('links');
	}
}
