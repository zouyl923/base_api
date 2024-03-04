<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;

class AdminPermissionSeeder extends Seeder
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
                'menu_id' => 1,
                'uri' => '/index/count*',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'menu_id' => 3,
                'uri' => 'set/admin*',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'menu_id' => 4,
                'uri' => 'set/permission*',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'menu_id' => 5,
                'uri' => 'set/log*',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'menu_id' => 7,
                'uri' => 'set/admin*',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'menu_id' => 8,
                'uri' => 'set/role*',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];
        \App\Model\AdminPermission::query()->insert($data);
    }
}
