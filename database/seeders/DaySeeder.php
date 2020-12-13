<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'name' => 'Saturday',
        ]);
        DB::table('days')->insert([
            'name' => 'Sunday',
        ]);
        DB::table('days')->insert([
            'name' => 'Monday',
        ]);
        DB::table('days')->insert([
            'name' => 'Tuesday',
        ]);
        DB::table('days')->insert([
            'name' => 'Wednesday',
        ]);
        DB::table('days')->insert([
            'name' => 'Thursday',
        ]);
        DB::table('days')->insert([
            'name' => 'Friday',
        ]);
    }
}
