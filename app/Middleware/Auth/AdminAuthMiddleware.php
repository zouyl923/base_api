<?php

declare(strict_types=1);

namespace App\Middleware\Auth;

use App\Services\Admin\AuthService;
use Hyperf\Di\Annotation\Inject;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AdminAuthMiddleware implements MiddlewareInterface
{
    public array $unCheckLogin = [
        '/admin/login/env_config',
        '/admin/login/account_login',
    ];

    #[Inject]
    public AuthService $authService;

    public function __construct(protected ContainerInterface $container)
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $uri = $request->getUri()->getPath();
        if (!in_array($uri, $this->unCheckLogin)) {
            $token = $request->getHeader('Authorization')[0] ?? '';
            $this->authService->checkToken($token);
        }
        return $handler->handle($request);
    }
}
