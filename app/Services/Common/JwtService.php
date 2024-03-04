<?php

namespace App\Services\Common;

use App\Exception\AdminException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use function Hyperf\Support\env;

class JwtService
{
    private $key;

    private $algo = 'HS256';

    public function __construct()
    {
        $this->key = env('JWT_KEY');
    }

    /**
     * @param array $payload 加密参数
     * @return void
     */
    public function encode(array $payload): ?string
    {
        $key = hash('sha256', $this->key);
        return JWT::encode($payload, $key, $this->algo);
    }

    /**
     * @param string $jwt 密文
     * @return array
     */
    public function decode(string $jwt): array
    {
        try {
            $key = hash('sha256', $this->key);
            $jwt = JWT::decode($jwt, new Key($key, $this->algo));
            return ['code' => 0, 'jwt' => $jwt, 'message' => ''];
        } catch (\Exception $e) {
            return ['code' => -1, 'message' => $e->getMessage()];
        }
    }
}