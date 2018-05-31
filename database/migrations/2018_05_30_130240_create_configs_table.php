<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('configs' , function(Blueprint $table) {
			$table->increments('id');
			$table->string('key');
			$table->string('value')->nullable();
			$table->string('desc')->nullable();
			$table->timestamps();
		});
		$data = [
			[ 'key' => 'web_name' , 'value' => '黑马高考' ] ,
			[ 'key' => 'copyright' , 'value' => '黑马高考版权' ] ,
			[ 'key' => 'login_message' , 'value' => '黑马高考登录界面信息' ] ,
			[ 'key' => 'web_url' , 'value' => '黑马高考URL' ] ,
			[ 'key' => 'seo_index' , 'value' => '黑马高考首页标题' ] ,
			[ 'key' => 'seo_keywords' , 'value' => '黑马高考关键字' ] ,
			[ 'key' => 'seo_description' , 'value' => '黑马高考描述' ] ,
			[ 'key' => 'analyze_code' , 'value' => '黑马高考统计代码' ] ,
		];
		DB::table('configs')->insert($data);
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('config');
	}
}
