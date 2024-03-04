<?php

declare(strict_types=1);

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

#[Constants]
class AdminError extends AbstractConstants
{
    /**
     * @Message("操作成功！")
     */
    const SUCCESS = 0;

    /**
     * @Message("操作失败！")
     */
    const ERROR = -1;

    /**
     * @Message("参数错误！")
     */
    const PARAMS_ERROR = -2;

    /**
     * admin错误码101开头
     * admin_role错误码102开头
     * admin_permission错误码103开头
     * admin_menu错误码104开头
     */

    /**
     * @Message("管理员不存在")
     */
    const ADMIN_NOT_FOUND = 10100;
    /**
     * @Message("账号密码不存在")
     */
    const ADMIN_ACCOUNT_ERROR = 10101;

    /**
     * @Message("登录失败")
     */
    const ADMIN_LOGIN_FAIL = 10102;


    /**
     * @Message("账号密码错误3次，请10分钟后再次尝试！")
     */
    const ADMIN_ERROR_LIMIT = 10103;
}