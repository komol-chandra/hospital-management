<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'doctor_id'  => '1',
            'day_id'     => '1',
            'starting'   => '11:30',
            'ending'     => '13:30',
            'quantity'   => '20',
            'status'     => '1',
            'created_by' => '1',
        ]);
        DB::table('schedules')->insert([
            'doctor_id'  => '1',
            'day_id'     => '2',
            'starting'   => '11:30',
            'ending'     => '13:30',
            'quantity'   => '20',
            'status'     => '1',
            'created_by' => '1',
        ]);
        DB::table('schedules')->insert([
            'doctor_id'  => '1',
            'day_id'     => '3',
            'starting'   => '11:30',
            'ending'     => '13:30',
            'quantity'   => '20',
            'status'     => '1',
            'created_by' => '1',
        ]);
        DB::table('schedules')->insert([
            'doctor_id'  => '1',
            'day_id'     => '4',
            'starting'   => '11:30',
            'ending'     => '13:30',
            'quantity'   => '20',
            'status'     => '1',
            'created_by' => '1',
        ]);
        DB::table('schedules')->insert([
            'doctor_id'  => '1',
            'day_id'     => '5',
            'starting'   => '11:30',
            'ending'     => '13:30',
            'quantity'   => '20',
            'status'     => '1',
            'created_by' => '1',
        ]);
        DB::table('schedules')->insert([
            'doctor_id'  => '1',
            'day_id'     => '6',
            'starting'   => '11:30',
            'ending'     => '13:30',
            'quantity'   => '20',
            'status'     => '1',
            'created_by' => '1',
        ]);
    }
}
