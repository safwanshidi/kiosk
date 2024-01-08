<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'ic' => '123456789012',
                'email' => 'admin@example.com',
                'phone' => '0123456789',
                'role' => 'ADMIN',
                'password' => 'password', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Student',
                'ic' => '111111111111',
                'email' => 'student@example.com',
                'phone' => '1234567888',
                'role' => 'STUDENT',
                'password' => 'password', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Technical',
                'ic' => '333333333333',
                'email' => 'tech@example.com',
                'phone' => '1234567999',
                'role' => 'FK TECHNICAL TEAM',
                'password' => 'password', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bursary',
                'ic' => '555555555555',
                'email' => 'bursary@example.com',
                'phone' => '1234567333',
                'role' => 'FK BURSARY',
                'password' => 'password', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vendor',
                'ic' => '444444444444',
                'email' => 'vendor@example.com',
                'phone' => '1234567000',
                'role' => 'VENDOR',
                'password' => 'password', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pupuk Admin',
                'ic' => '666666666666',
                'email' => 'pupuk@example.com',
                'phone' => '1234567121',
                'role' => 'PUPUK ADMIN',
                'password' => 'password', 
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
