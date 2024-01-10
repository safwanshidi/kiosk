<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;

class ArrearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        for($i=0; $i<=6;$i++)
		{
			$date = $this->generateDate();
            $amount = rand(1,1000)/100;
            
            DB::table('arrears')->insert([
            'date'=>$date,
            'amount'=>$amount,
            ]);
		}
		
   }

   private function generateDate():string
    {
        $year = rand(1999,3000);
        $month = rand(1,12);
        $day = rand(1,30);
           
        $date = $year."-".$month."-".$day;   
        return $date;
    }
}
