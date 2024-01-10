<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=2; $i<=4;$i++)
		{
			$date1 = $this->generateDate();
            $date2 = $this->generateDate();
            $time = rand(0,59).":".rand(0,59).":".rand(0,59);

            $amount = rand(1,1000)/100;
           
            DB::table('receipts')->insert([
			
			'id' => Str::random(10),
			'date'=>$date1,
			'time'=>$time,
            'amount'=>$amount,
            'months_of_pay'=>$date2,
            'user_id'=>rand(2,5),
			
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
