<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
		
			for($i=0; $i<=10;$i++)
			{
				DB::table('users')->insert([
				[
                'name' => 'Student',
                'ic' => '1111233'.$i.'11111',
                'email' => 'student2'.$i.'@example.com',
                'phone' => '123'.$i.'644888',
                'role' => 'STUDENT',
                'password' => 'password', 
                'created_at' => now(),
                'updated_at' => now(),
				],		
				]);
			}
			
    }
}
