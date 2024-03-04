<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminPasswordTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_password', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id')->comment("接受者ID");
            $table->string('old_password')->comment("旧密码");
            $table->string('new_password')->comment("新密码");
            $table->datetimes();
            $table->comment("管理员-密码修改记录");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_password');
    }
}
