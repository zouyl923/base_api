<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id
 * @property string $name 账号名
 * @property string $phone 手机号
 * @property string $password 密码
 * @property int $is_hid 是否禁用：1是 0否
 * @property int $is_del 是否删除：1是 0否
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $deleted_at 删除时间
 */
class Admin extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'admin';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'is_hid' => 'integer', 'is_del' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'integer'];

    public function roleInfo()
    {
        return $this->hasOne(AdminRole::class, 'id', 'role_id');
    }
}
