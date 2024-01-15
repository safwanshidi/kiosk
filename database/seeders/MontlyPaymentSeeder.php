<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MontlyPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 
		
			$amount = rand(1,1000)/100;
			DB::table('montly_amounts')->insert([
				'amount'=>$amount,
				'status'=>rand(0,1)
            ]);			
		

    }
}
