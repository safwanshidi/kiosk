<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optionsTypes = ['broken wheel', 'broken hinge', 'broken wall', 'others'];
        $defaultStatus = 'in process'; // Set a default status for seeding

        for ($i = 0; $i <= 10; $i++) {
            DB::table('complaint')->insert([
                'c_name' => 'Student',
                'c_email' => 'student' . ($i + 2) . '@example.com',
                'c_ic_num' => '1111233' . ($i + 1) . '11111',
                'c_type' => null, // Set null for the type, allowing users to select their own
                'c_date' => now()->format('Y-m-d H:i:s'),
                'c_details' => 'detailss',
                'c_status' => $defaultStatus, // Set a default status
            ]);
        }
    }
}