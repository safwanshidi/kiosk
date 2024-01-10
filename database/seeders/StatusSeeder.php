<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=2; $i<=4;$i++)
        {
            DB::table('payment_status')->insert([
            'status' => rand(0,1),
            'arrears_id'=>rand(1,6),
            'users_id'=>rand(2,5),
            ]);
        }        
        
    }
}
