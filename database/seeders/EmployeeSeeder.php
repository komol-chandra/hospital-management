<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('employees')->insert([
                'roll_id'    => '3',
                'name'       => Str::random(10),
                'email'      => Str::random(10) . '@gmail.com',
                'address'    => Str::random(50),
                // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
                'blood_id'   => '1',
                'mobile'     => rand(11, 12),
                'phone'      => rand(11, 12),
                'gender'     => '2',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            DB::table('employees')->insert([
                'roll_id'    => '4',
                'name'       => Str::random(10),
                'email'      => Str::random(10) . '@gmail.com',
                'address'    => Str::random(50),
                // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
                'blood_id'   => '1',
                'mobile'     => rand(11, 12),
                'phone'      => rand(11, 12),
                'gender'     => '1',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        DB::table('employees')->insert([
            'roll_id'    => '1',
            'name'       => Str::random(10),
            'email'      => Str::random(10) . '@gmail.com',
            'address'    => Str::random(50),
            // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
            'blood_id'   => '1',
            'mobile'     => rand(11, 12),
            'phone'      => rand(11, 12),
            'gender'     => '1',
            'status'     => '1',
            'created_by' => '1',
        ]);
    }
}
