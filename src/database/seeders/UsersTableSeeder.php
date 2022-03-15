<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'tenant_id' => 1,
                'name' => 'テスト管理者1',
                'email' => 'test1@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tenant_id' => 2,
                'name' => 'テスト管理者2',
                'email' => 'test2@example.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
