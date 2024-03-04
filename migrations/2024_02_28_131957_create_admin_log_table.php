<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateAdminLogTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('admin_id')->comment("操作者");
            $table->string('name')->comment("操作行为");
            $table->string('uri')->comment("操作接口地址");
            $table->string('ip', 20)->comment("ip");
            $table->string('agent')->comment("agent");
            $table->longText('data')->nullable()->comment("操作数据JSON");
            $table->datetimes();
            $table->comment("管理员操作日志表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_log');
    }
}
