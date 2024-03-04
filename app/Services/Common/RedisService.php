<?php

namespace App\Services\Common;

use Hyperf\Context\ApplicationContext;
use Hyperf\Redis\Redis;

class RedisService
{
    public static $instance = null;

    /**
     * @return Redis
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function instance()
    {
        if (self::$instance) {
            return self::$instance;
        }

        $container = ApplicationContext::getContainer();
        self::$instance = $container->get(Redis::class);
        return self::$instance;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return self::$instance->get($key);
    }

    public function set(string $key, string $value, $ttl = 7200)
    {
        return self::$instance->set($key, $value, $ttl);
    }

    public function del(string $key)
    {
        return self::$instance->del($key);
    }
}