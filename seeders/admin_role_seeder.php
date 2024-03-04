<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => '超级管理员',
            'is_hid' => 0,
            'is_del' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];
        \App\Model\AdminRole::query()->insert($data);
    }
}
