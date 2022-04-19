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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'tenant_id' => 1,
                'name' => 'テストuser1',
                'email' => 'test1@dev.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'pin' => 0000,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tenant_id' => 1,
                'name' => 'テストuser2',
                'email' => 'test2@dev.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'pin' => 0000,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tenant_id' => 1,
                'name' => 'テストuser3',
                'email' => 'test3@dev.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'pin' => 0000,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tenant_id' => 2,
                'name' => 'テストuser4',
                'email' => 'test4@dev.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'pin' => 0000,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tenant_id' => 2,
                'name' => 'テストuser5',
                'email' => 'test5@dev.com',
                'email_verified_at' => null,
                'password' => Hash::make('password'),
                'pin' => 0000,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
