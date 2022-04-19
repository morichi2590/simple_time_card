<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('shops')->truncate();

        DB::table('shops')->insert([
            [
                'tenant_id'  => 1,
                'name'       => 'クリーニング１号店',
                'shop_code'  => uniqid(),
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tenant_id'  => 1,
                'name'       => 'クリーニング２号店',
                'shop_code'  => uniqid(),
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'tenant_id'  => 2,
                'name'       => 'カフェ１号店',
                'shop_code'  => uniqid(),
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');        
    }
}
