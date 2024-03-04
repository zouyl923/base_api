<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id 
 * @property int $admin_id 操作者
 * @property string $name 操作行为
 * @property string $uri 操作接口地址
 * @property string $ip ip
 * @property string $agent agent
 * @property string $data 操作数据JSON
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class AdminLog extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'admin_log';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'admin_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
