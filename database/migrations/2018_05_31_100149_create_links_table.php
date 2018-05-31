<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('友情链接文字');
            $table->string('pic')->comment('友情链接图片地址');
            $table->string('url')->comment('友情链接地址');
            $table->string('type')->default(1)->comment('友情链接类型区分0:图片,1:文字');
            $table->string('seat')->comment('友情链接展示位置');
            $table->string('status')->default(1)->comment('友情链接当前的状态0:未发布,1:发布,-1:待审核');
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
