<?php

declare(strict_types=1);

namespace App\Controller\Admin\Set;

use App\Controller\BaseController;
use App\Request\Admin\MenuRequest;
use App\Services\Admin\Set\MenuService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\PostMapping;
use Hyperf\HttpServer\Contract\RequestInterface;

#[Controller]
class MenuController extends BaseController
{
    #[Inject]
    public MenuService $menuService;

    #[GetMapping(path: "tree_list")]
    public function treeList(): \Psr\Http\Message\ResponseInterface
    {
        return $this->success($this->menuService->treeList());
    }

    #[GetMapping(path: "all_list")]
    public function allList(): \Psr\Http\Message\ResponseInterface
    {
        return $this->success($this->menuService->allList());
    }

    #[GetMapping(path: "info")]
    public function info(RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        $id = (int)$request->input('id');
        return $this->success($this->menuService->info($id));
    }


    #[PostMapping(path: "update")]
    public function update(MenuRequest $request): \Psr\Http\Message\ResponseInterface
    {
        return $this->success($this->menuService->store($request->all()));
    }

    #[PostMapping(path: "delete")]
    public function delete(RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        $id = $request->input('id');
        return $this->success($this->menuService->delete($id));
    }
}
