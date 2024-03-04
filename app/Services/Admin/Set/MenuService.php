<?php

namespace App\Services\Admin\Set;

use App\Constants\AdminError;
use App\Constants\CommonError;
use App\Exception\AdminException;
use App\Model\AdminMenu;
use App\Tools\Arrays;

class MenuService
{
    public function treeList(): array
    {
        $list = AdminMenu::query()
            ->orderBy('weight', 'desc')
            ->where('is_del', 0)
            ->get()->toArray();
        $tree = Arrays::createTree($list);
        return $tree;
    }

    public function allList(): array
    {
        return AdminMenu::query()
            ->where('is_del', 0)
            ->orderBy('weight', 'desc')
            ->get()->toArray();
    }

    public function info(int $id): ?array
    {
        $info = AdminMenu::query()
            ->where('is_del', 0)
            ->where('id', $id)->first();
        if ($info) {
            return $info->toArray();
        }
        return null;
    }


    /**
     * @param array $data
     */
    public function store(array $data): bool
    {
        $id = (int)$data['id'] ?? 0;
        unset($data['id']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $res = AdminMenu::query()
            ->where('is_del', 0)
            ->updateOrInsert(['id' => $id], $data);
        if (!$res) {
            throw new AdminException(AdminError::ERROR);
        }
        return $res;
    }

    public function delete(array|int $id): bool
    {
        $ids = is_array($id) ? $id : [$id];
        $res = AdminMenu::query()->whereIn('id', $ids)->update(['is_del' => 1]);
        if (!$res) {
            throw new AdminException(AdminError::ERROR);
        }
        return $res;
    }
}