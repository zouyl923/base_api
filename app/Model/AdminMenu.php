<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id 
 * @property int $parent_id 父级ID
 * @property string $name 菜单名称
 * @property string $uri 菜单地址
 * @property string $icon iconfont图标库的图标
 * @property int $weight 权重
 * @property int $is_hid 是否禁用：1是 0否
 * @property int $is_del 是否删除：1是 0否
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property int $deleted_at 删除时间
 */
class AdminMenu extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'admin_menu';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'id'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'parent_id' => 'integer', 'weight' => 'integer', 'is_hid' => 'integer', 'is_del' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'integer'];
}
