<?php

namespace App\Services\Admin;

use App\Constants\AdminError;
use App\Exception\AdminException;
use App\Services\Common\JwtService;
use App\Services\Common\RedisService;
use Hyperf\Di\Annotation\Inject;

class AuthService
{
    public static string $cacheTokenPrefix = "admin:token:";
    public static string $cacheRefreshTokenPrefix = "admin:refresh_token:";
    private static ?AuthService $instance = null;

    private static int $adminId;

    public static function instance()
    {
        if (self::$instance) {
            return self::$instance;
        }
        return new AuthService();
    }

    #[Inject]
    public JwtService $jwtService;

    public function checkToken(string $token)
    {
        if (!$token) {
            throw new AdminException(AdminError::ADMIN_LOGIN_FAIL);
        }
        $decode = $this->jwtService->decode($token);
        if ($decode['code'] == -1) {
            throw new AdminException(AdminError::ADMIN_LOGIN_FAIL);
        }
        $jwt = $decode['jwt'];
        $cacheKey = self::$cacheTokenPrefix . $jwt->id;
        $checkToken = RedisService::instance()->get($cacheKey);
        if (!$checkToken || $checkToken != $token) {
            throw new AdminException(AdminError::ADMIN_LOGIN_FAIL);
        }
        self::$adminId = $jwt->id;
    }

    /**
     * 生成token
     * @param int $adminId
     * @return array
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     * @throws \RedisException
     */
    public function createToken(int $adminId): array
    {
        $payload = [
            'id' => $adminId,
            'timestamps' => time(),
            'nonce' => hash('sha256', $adminId . time())
        ];
        $token = $this->jwtService->encode($payload);
        $refreshToken = md5(json_encode($payload) . $token);
        RedisService::instance()->set(self::$cacheTokenPrefix . $adminId, $token, 2 * 60 * 60);
        RedisService::instance()->set(self::$cacheRefreshTokenPrefix . $adminId, $refreshToken, 7 * 24 * 60 * 60);
        return ['token' => $token, 'refresh_token' => $refreshToken];
    }

    public function clearToken(int $adminId)
    {
        RedisService::instance()->del(self::$cacheTokenPrefix . $adminId);
        RedisService::instance()->del(self::$cacheRefreshTokenPrefix . $adminId);
    }

    public function getAdminId()
    {
        return self::$adminId;
    }
}