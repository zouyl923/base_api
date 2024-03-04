<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminMenuTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0)->comment('父级ID');
            $table->string('name', 32)->comment('菜单名称');
            $table->string('uri')->nullable()->comment('菜单地址');
            $table->string('icon')->nullable()->comment('iconfont图标库的图标');
            $table->integer('weight')->comment('权重');
            $table->tinyInteger('is_hid')->default(0)->comment("是否禁用：1是 0否");
            $table->tinyInteger('is_del')->default(0)->comment("是否删除：1是 0否");
            $table->datetimes();
            $table->integer('deleted_at')->default(0)->comment("删除时间");
            $table->comment("管理后台-菜单表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_menu');
    }
}
