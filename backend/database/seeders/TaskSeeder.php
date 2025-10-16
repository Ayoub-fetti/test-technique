<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
 
    
    public function run(): void
    {
            for ($i = 0; $i < 10; $i++ ) {
            DB::table('tasks')->insert([
                'title' => Str::random(10),
                'description' => Str::random(10).'@example.com'
                
            ]);
        }
    }
}
