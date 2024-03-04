<?php

declare(strict_types=1);

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

#[Constants]
class CommonError extends AbstractConstants
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
}