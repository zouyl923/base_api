<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Exception\Handler;

use App\Constants\CommonError;
use App\Exception\AdminException;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Validation\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    public function __construct(protected StdoutLoggerInterface $logger)
    {
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $showLog = true;

        $message = $throwable->getMessage();
        $code = CommonError::PARAMS_ERROR;
        if ($throwable instanceof ValidationException) {
            $message = $throwable->validator->errors()->first();
            $showLog = false;
        }
        if ($throwable instanceof AdminException) {
            $code = $throwable->getCode();
            $showLog = false;
        }
        $data = [
            'code' => $code,
            'message' => $message,
            'data' => null
        ];
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        if ($showLog === true) {
            $this->logger->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(), $throwable->getFile()));
            $this->logger->error($throwable->getTraceAsString());
        }
        return $response
            ->withHeader("Content-Type", "application/json;charset=utf-8")
            ->withStatus(200)
            ->withBody(new SwooleStream($data));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
