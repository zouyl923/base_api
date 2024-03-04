<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_role_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id')->comment("角色ID");
            $table->integer('menu_id')->comment("菜单ID");
            $table->datetimes();
            $table->comment("管理员-角色-关联权限表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_role_permisson_');
    }
}
