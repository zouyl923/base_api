<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminPermissionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_id')->comment("菜单ID");
            $table->text('uri')->comment('权限访问-接口地址,可以多个可以换行，可以*匹配');
            $table->datetimes();
            $table->comment("管理后台-菜单-关联权限表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_permisson_');
    }
}
