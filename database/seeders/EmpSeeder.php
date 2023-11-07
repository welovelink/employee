<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'uid' => 1,
            'code' => 'EMP001',
            'position_id' => 1,
            'department_id' => 1,
            'line_manager' => 1,
            'start_date' => '2023-01-01',
            'end_date' => '2023-12-31',
            'created_at' => now()
        ]);

        DB::table('employees')->insert([
            'uid' => 2,
            'code' => 'EMP002',
            'position_id' => 2,
            'department_id' => 1,
            'line_manager' => 1,
            'start_date' => '2023-01-01',
            'end_date' => '2023-12-31',
            'created_at' => now()
        ]);

        DB::table('employees')->insert([
            'uid' => 3,
            'code' => 'EMP003',
            'position_id' => 3,
            'department_id' => 1,
            'line_manager' => 1,
            'start_date' => '2023-01-01',
            'end_date' => '2023-12-31',
            'created_at' => now()
        ]);
    }
}
