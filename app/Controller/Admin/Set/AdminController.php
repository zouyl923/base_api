<?php

declare(strict_types=1);

namespace App\Controller\Admin\Set;

use App\Controller\BaseController;
use App\Services\Admin\AuthService;
use App\Services\Admin\Set\AdminService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[Controller]
class AdminController extends BaseController
{
    #[Inject]
    public AdminService $adminService;

    #[GetMapping(path: 'info')]
    public function info(RequestInterface $request, ResponseInterface $response)
    {
        $adminId = AuthService::instance()->getAdminId();
        $info = $this->adminService->info($adminId);
        return $this->success($info);
    }
}
