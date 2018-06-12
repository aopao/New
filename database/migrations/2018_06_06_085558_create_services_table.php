<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('服务标题');
            $table->string('subtitle')->comment('服务副标题');
            $table->string('desc')->comment('服务简介');
            $table->string('content')->comment('服务内容');
            $table->string('current_price')->comment('服务现价');
            $table->string('original_price')->comment('服务原价');
            $table->string('teacher')->comment('服务师资');
            $table->string('method')->comment('服务方式');
            $table->string('obj')->comment('服务对象');
            $table->string('pic')->comment('服务图片');
            $table->string('status')->default(1)->comment('服务状态');

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
        Schema::dropIfExists('services');
    }
}
