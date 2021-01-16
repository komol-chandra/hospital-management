<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('patients')->insert([
                'code'       => Str::random(6),
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
                'today_date' => Carbon::now()->format('y-m-d'),

            ]);
        }
    }
}
