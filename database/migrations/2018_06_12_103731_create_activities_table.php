<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('活动标题');
            $table->string('subtitle')->comment('活动副标题');
            $table->string('desc')->comment('活动简介');
            $table->string('content')->comment('活动内容');
            $table->string('range')->comment('活动起止时间');
            $table->string('method')->comment('活动方式');
            $table->string('obj')->comment('活动对象');
            $table->string('pic')->comment('活动图片');
            $table->string('status')->default(1)->comment('活动状态');

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
        Schema::dropIfExists('activities');
    }
}
