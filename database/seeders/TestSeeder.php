<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert([
            'name'       => 'X-Ray',
            'details'    => Str::random(10),
            'lab_name'   => Str::random(5),
            'prize'      => rand(2, 3),
            'created_by' => '1',
        ]);
        DB::table('tests')->insert([
            'name'       => 'angiocardiography',
            'details'    => Str::random(10),
            'lab_name'   => Str::random(5),
            'prize'      => rand(2, 3),
            'created_by' => '1',
        ]);
        DB::table('tests')->insert([
            'name'       => 'angiography',
            'details'    => Str::random(10),
            'lab_name'   => Str::random(5),
            'prize'      => rand(2, 3),
            'created_by' => '1',
        ]);
        DB::table('tests')->insert([
            'name'       => 'brain scanning',
            'details'    => Str::random(10),
            'lab_name'   => Str::random(5),
            'prize'      => rand(2, 3),
            'created_by' => '1',
        ]);
        DB::table('tests')->insert([
            'name'       => 'cholecystography',
            'details'    => Str::random(10),
            'lab_name'   => Str::random(5),
            'prize'      => rand(2, 3),
            'created_by' => '1',
        ]);
    }
}
