<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id 
 * @property int $admin_id 接受者ID
 * @property string $title 消息标题
 * @property string $content 消息内容
 * @property int $is_read 是否已读：1是 0否
 * @property int $is_del 是否删除：1是 0否
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property int $deleted_at 删除时间
 */
class AdminMessage extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'admin_message';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'admin_id' => 'integer', 'is_read' => 'integer', 'is_del' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'integer'];
}
