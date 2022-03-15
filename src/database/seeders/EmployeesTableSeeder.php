<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->truncate();

        DB::table('employees')->insert([
            [
                'name_last' => '田中',
                'name_first' => '太郎',
                'kana_last' => 'タナカ',
                'kana_first' => 'タロウ',
                'sex' => 0,
                'memo' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name_last' => '鈴木',
                'name_first' => '一郎',
                'kana_last' => 'スズキ',
                'kana_first' => 'イチロウ',
                'sex' => 1,
                'memo' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name_last' => '山田',
                'name_first' => '花子',
                'kana_last' => 'ヤマダ',
                'kana_first' => 'ハナコ',
                'sex' => 2,
                'memo' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name_last' => '長谷川',
                'name_first' => '純一郎',
                'kana_last' => 'ハセガワ',
                'kana_first' => 'ジュンイチロウ',
                'sex' => 1,
                'memo' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
