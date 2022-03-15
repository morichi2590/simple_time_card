<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employment_statuses')->truncate();

        DB::table('employment_statuses')->insert([
            [
                'employee_id' => 1,
                'wage_type' => 0,
                'wage_price' => 1100,
                'employment_type' => 0,
                'status_start' => date('Y-m-d H:i:s'),
                'status_end' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'employee_id' => 2,
                'wage_type' => 0,
                'wage_price' => 1000,
                'employment_type' => 1,
                'status_start' => date('Y-m-d H:i:s'),
                'status_end' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'employee_id' => 3,
                'wage_type' => 0,
                'wage_price' => 1200,
                'employment_type' => 1,
                'status_start' => date('Y-m-d H:i:s'),
                'status_end' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'employee_id' => 4,
                'wage_type' => 0,
                'wage_price' => 1100,
                'employment_type' => 1,
                'status_start' => date('Y-m-d H:i:s'),
                'status_end' => null,
                'deleted_at' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
