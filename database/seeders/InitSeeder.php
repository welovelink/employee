<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@company.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'created_at' => now()
        ]);*/

        DB::table('users')->insert([
            'name' => 'Big Emp',
            'email' => 'big@company.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'manager',
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Medium Emp',
            'email' => 'medium@company.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'user',
            'created_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Small Emp',
            'email' => 'small@company.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => 'user',
            'created_at' => now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Development',
            'created_at' => now()
        ]);

        DB::table('departments')->insert([
            'name' => 'Marketing',
            'created_at' => now()
        ]);

        DB::table('positions')->insert([
            'name' => 'Manager',
            'created_at' => now()
        ]);

        DB::table('positions')->insert([
            'name' => 'Backend Developer',
            'created_at' => now()
        ]);

        DB::table('positions')->insert([
            'name' => 'Frontend Developer',
            'created_at' => now()
        ]);
    }
}
