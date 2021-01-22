<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'name'          => 'Martin Lara',
            'email'         => Str::random(10) . '@gmail.com',
            'designation'   => Str::random(10),
            'address'       => Str::random(15),
            'biography'     => Str::random(15),
            'specialist'    => Str::random(15),
            'education'     => Str::random(20),
            // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
            'department_id' => '1',
            'mobile'        => (+880) . rand(1800000000, 1899999999),
            'phone'         => rand(1000000, 2000000),
            'gender'        => rand(1, 2),
            'status'        => '1',
            'created_by'    => '1',
        ]);
        DB::table('doctors')->insert([
            'name'          => 'Susan Donovan',
            'email'         => Str::random(10) . '@gmail.com',
            'designation'   => Str::random(10),
            'address'       => Str::random(15),
            'biography'     => Str::random(15),
            'specialist'    => Str::random(15),
            'education'     => Str::random(20),
            // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
            'department_id' => '2',
            'mobile'        => (+880) . rand(1800000000, 1899999999),
            'phone'         => rand(1000000, 2000000),
            'gender'        => rand(1, 2),
            'status'        => '1',
            'created_by'    => '1',
        ]);
        DB::table('doctors')->insert([
            'name'          => 'Eliana Goodwin',
            'email'         => Str::random(10) . '@gmail.com',
            'designation'   => Str::random(10),
            'address'       => Str::random(15),
            'biography'     => Str::random(15),
            'specialist'    => Str::random(15),
            'education'     => Str::random(20),
            // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
            'department_id' => '3',
            'mobile'        => (+880) . rand(1800000000, 1899999999),
            'phone'         => rand(1000000, 2000000),
            'gender'        => rand(1, 2),
            'status'        => '1',
            'created_by'    => '1',
        ]);
        DB::table('doctors')->insert([
            'name'          => 'Kevin paul',
            'email'         => Str::random(10) . '@gmail.com',
            'designation'   => Str::random(10),
            'address'       => Str::random(15),
            'biography'     => Str::random(15),
            'specialist'    => Str::random(15),
            'education'     => Str::random(20),
            // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
            'department_id' => '4',
            'mobile'        => (+880) . rand(1800000000, 1899999999),
            'phone'         => rand(1000000, 2000000),
            'gender'        => rand(1, 2),
            'status'        => '1',
            'created_by'    => '1',
        ]);
        DB::table('doctors')->insert([
            'name'          => 'lara paul',
            'email'         => Str::random(10) . '@gmail.com',
            'designation'   => Str::random(10),
            'address'       => Str::random(15),
            'biography'     => Str::random(15),
            'specialist'    => Str::random(15),
            'education'     => Str::random(20),
            // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
            'department_id' => '5',
            'mobile'        => (+880) . rand(1800000000, 1899999999),
            'phone'         => rand(1000000, 2000000),
            'gender'        => rand(1, 2),
            'status'        => '1',
            'created_by'    => '1',
        ]);

    }
}
