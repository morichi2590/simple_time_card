<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(TenantsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(BelongShopsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(EmploymentStatusesTableSeeder::class);
    }
}
