<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\BaseController;
use App\Services\Admin\AuthService;
use App\Services\Admin\LoginService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use function Hyperf\Support\env;

#[Controller]
class LoginController extends BaseController
{

    #[Inject]
    public LoginService $loginService;

    #[GetMapping(path: "env_config")]
    public function envConfig(RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        $time = time();
        $agent = $request->getHeader('user-agent')[0] ?? '';
        $uid = hash('sha256', $agent . env('APP_KEY') . $time);
        $config = [
            'app_name' => env('APP_NAME'),
            'env' => env('APP_ENV'),
            'time_zone' => ini_get('date.timezone'),
            'agent' => $agent,
            'uid' => $uid,
            'timestamp' => date('Y-m-d H:i:s'),
            'server' => $request->getServerParams(),
        ];
        return $this->success($config);
    }

    #[PostMapping(path: "account_login")]
    public function login(RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $result = $this->loginService->login($username, $password);
        return $this->success($result);
    }

    #[PostMapping(path: "login_out")]
    public function loginOut(): \Psr\Http\Message\ResponseInterface
    {
        $adminId = AuthService::instance()->getAdminId();
        $this->loginService->loginOut($adminId);
        return $this->success();
    }
}
