<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('driver')->default('smtp')->comment('邮件发送驱动');;
            $table->string('host')->default('smtp.qq.com')->comment('邮件发送主机地址');
            $table->string('port')->default('465')->comment('邮件发送端口');
            $table->string('username')->comment('邮件发送人邮箱地址');
            $table->string('password')->comment('邮件发送人邮箱授权码');
            $table->string('encryption')->default('ssl')->comment('邮件加密方式');
            $table->string('fromaddr')->comment('邮件发送人邮箱地址');
            $table->string('fromname')->comment('邮件发送人昵称');

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
        Schema::dropIfExists('email_configs');
    }
}
