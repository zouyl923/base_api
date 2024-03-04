<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('group', 32)->comment("配置分组");
            $table->string('key', 32)->comment("配置的key");
            $table->text('value')->comment("配置value");
            $table->string('intro')->comment("配置说明");
            $table->datetimes();
            $table->comment("全局配置表");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comfig');
    }
}
