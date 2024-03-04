<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 32)->comment("账号名");
            $table->string('phone', 11)->comment("手机号");
            $table->string('password', 64)->comment("密码");
            $table->integer('role_id')->default(0)->comment("密码");
            $table->tinyInteger('is_hid')->default(0)->comment("是否禁用：1是 0否");
            $table->tinyInteger('is_del')->default(0)->comment("是否删除：1是 0否");
            $table->datetimes();
            //软删除与唯一索引防止冲突，所以使用int；datetime存在null情况无法使用索引
            $table->integer('deleted_at')->default(0)->comment("删除时间");
            $table->unique(['phone', 'deleted_at']);//软删除 保证phone唯一性
            $table->comment("管理员表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
}
