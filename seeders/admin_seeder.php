<?php

declare(strict_types=1);

use Hyperf\Database\Seeders\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'admin',
            'phone' => '13588888888',
            'password' => password_hash("123456", PASSWORD_DEFAULT),
            'role_id' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];
        \App\Model\Admin::query()->insert($data);
    }
}
