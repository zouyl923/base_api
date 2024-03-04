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
return [
    'http' => [
        \App\Middleware\CorsMiddleware::class,//跨域
        \App\Middleware\Auth\AdminAuthMiddleware::class,//管理后台
        \App\Middleware\Auth\UserAuthMiddleware::class,//前端
        \Hyperf\Validation\Middleware\ValidationMiddleware::class //验证器
    ],
];
