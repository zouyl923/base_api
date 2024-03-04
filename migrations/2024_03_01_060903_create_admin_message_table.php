<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminMessageTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_message', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id')->comment("接受者ID");
            $table->string('title')->comment("消息标题");
            $table->text('content')->comment("消息内容");
            $table->tinyInteger('is_read')->default(0)->comment("是否已读：1是 0否");
            $table->tinyInteger('is_del')->default(0)->comment("是否删除：1是 0否");
            $table->datetimes();
            $table->integer('deleted_at')->default(0)->comment("删除时间");
            $table->comment("管理后台消息表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_message');
    }
}
