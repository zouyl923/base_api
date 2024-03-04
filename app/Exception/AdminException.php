<?php

namespace App\Exception;

use App\Constants\AdminError;
use Hyperf\Server\Exception\ServerException;

class AdminException extends ServerException
{
    public function __construct(int $code = 0, string $message = null, \Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = AdminError::getMessage($code);
        }
        parent::__construct($message, $code, $previous);
    }
}