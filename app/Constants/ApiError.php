<?php

declare(strict_types=1);

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

#[Constants]
class ApiError extends Constants
{
    /**
     * @Message("操作成功！")
     */
    const SUCCESS = 0;

}