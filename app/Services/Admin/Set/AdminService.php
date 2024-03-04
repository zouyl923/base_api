<?php

namespace App\Services\Admin\Set;

use App\Model\Admin;
use Hyperf\Cache\Annotation\Cacheable;

class AdminService
{
    #[Cacheable(prefix: 'admin', ttl: 7200)]
    public function info(int $adminId)
    {
        $admin = Admin::query()->with(['roleInfo'])->where('id', $adminId)->first();
        if ($admin) {
            return $admin->toArray();
        }
        return null;
    }
}