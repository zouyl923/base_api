<?php

namespace App\Services\Common\WeChat;

use EasyWeChat\MiniApp\Application;
use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;

/**
 * 小程序相关
 */
class MiniFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get(ConfigInterface::class)->get('wechat.default');
        return new Application($config);
    }

}