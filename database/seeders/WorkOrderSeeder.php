<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $optionsTypes = ['maintenance', 'repair', 'installation', 'others'];
        $defaultStatus = 'pending'; // Set a default status for seeding

        for ($i = 0; $i <= 10; $i++) {
            DB::table('work_orders')->insert([
                'complaint_id' => $i + 1, // Assuming you have complaints with IDs from 1 to 11
                'wo_user_id' => $i + 1, // Assuming you have users with IDs from 1 to 11
                'tech_name' => 'Technician ' . ($i + 1),
                'wo_date' => now()->format('Y-m-d H:i:s'),
                'c_type' => $optionsTypes[array_rand($optionsTypes)], // Randomly select a type
                'wo_details' => 'Work order details ' . ($i + 1),
                'wo_status' => $defaultStatus, // Set a default status
            ]);
        }
    }
}