<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->insert([
        	'name'=>'A+',
        ]);
        DB::table('bloods')->insert([
        	'name'=>'A-',
        ]);
        DB::table('bloods')->insert([
        	'name'=>'B+',
        ]);
        DB::table('bloods')->insert([
        	'name'=>'B-',
        ]);
        DB::table('bloods')->insert([
        	'name'=>'AB+',
        ]);
        DB::table('bloods')->insert([
        	'name'=>'AB-',
        ]);
        DB::table('bloods')->insert([
        	'name'=>'O+',
        ]);
        DB::table('bloods')->insert([
        	'name'=>'O-',
        ]);
    }
}