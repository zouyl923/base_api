<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;

class AdminMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'parent_id' => 0,
                'name' => '首页',
                'uri' => '/',
                'icon' => 'icon-shouye',
                'weight' => 999,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'parent_id' => 0,
                'name' => '系统管理',
                'uri' => '',
                'icon' => 'icon-shezhi',
                'weight' => -999,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'parent_id' => 2,
                'name' => '菜单管理',
                'uri' => '/set/menu/list',
                'icon' => '',
                'weight' => -1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'parent_id' => 2,
                'name' => '权限管理',
                'uri' => '/set/permission/list',
                'icon' => '',
                'weight' => -2,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'parent_id' => 2,
                'name' => '操作日志',
                'uri' => '/set/log/list',
                'icon' => '',
                'weight' => -3,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'parent_id' => 0,
                'name' => '管理员设置',
                'uri' => '',
                'icon' => 'icon-wodeguanzhu',
                'weight' => -998,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'parent_id' => 6,
                'name' => '管理员',
                'uri' => '/set/admin/list',
                'icon' => '',
                'weight' => -1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'parent_id' => 6,
                'name' => '角色管理',
                'uri' => '/set/role/list',
                'icon' => '',
                'weight' => -2,
                'created_at' => date('Y-m-d H:i:s')
            ]
        ];
        \App\Model\AdminMenu::query()->insert($data);
    }
}
