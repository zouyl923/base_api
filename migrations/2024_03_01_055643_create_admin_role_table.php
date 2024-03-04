<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminRoleTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_role', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 32)->comment('角色名称');
            $table->tinyInteger('is_hid')->default(0)->comment("是否禁用：1是 0否");
            $table->tinyInteger('is_del')->default(0)->comment("是否删除：1是 0否");
            $table->datetimes();
            $table->integer('deleted_at')->default(0)->comment("删除时间");
            $table->comment("管理员-角色表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role');
    }
}
