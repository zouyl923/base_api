<?php

namespace App\Services\Admin;

use App\Constants\AdminError;
use App\Exception\AdminException;
use App\Model\Admin;
use App\Services\Common\JwtService;
use App\Services\Common\RedisService;
use Hyperf\Di\Annotation\Inject;

class LoginService extends BaseService
{
    #[Inject]
    public JwtService $jwtService;
    public string $errNumKey = "admin:login:error_num:";

    public function login(string $username, string $password): array
    {
        //限制登录次数
        $errNum = (int)RedisService::instance()->get($this->errNumKey . $username);
        if ($errNum >= 3) {
            throw new AdminException(AdminError::ADMIN_ERROR_LIMIT);
        }
        $admin = Admin::query()->where('name', $username)->first();
        if (!$admin) {
            RedisService::instance()->set($this->errNumKey . $username, $errNum + 1, 10 * 60);
            throw new AdminException(AdminError::ADMIN_NOT_FOUND);
        }
        //验证秘密
        if (!password_verify($password, $admin->password)) {
            RedisService::instance()->set($this->errNumKey . $username, $errNum + 1, 10 * 60);
            throw new AdminException(AdminError::ADMIN_ACCOUNT_ERROR);
        }
        $tokenArr = AuthService::instance()->createToken($admin->id);
        return ['token' => $tokenArr['token'], 'refresh_token' => $tokenArr['refresh_token'], 'admin_info' => $admin];
    }


    public function loginOut(int $adminId): void
    {
        AuthService::instance()->clearToken($adminId);
    }
}