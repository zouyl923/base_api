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

use Hyperf\HttpServer\Router\Router;

Router::get('/favicon.ico', function () {
    return '';
});

//给管理员添加授权中间件
Router::addGroup('/admin',
    function () {
    }, [
        'middleware' => [
            \App\Middleware\Auth\AdminAuthMiddleware::class
        ]
    ]
);