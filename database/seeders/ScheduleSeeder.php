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
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '1',
                'day_id'     => rand(1, 7),
                'starting'   => '11:30',
                'ending'     => '13:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '2',
                'day_id'     => rand(1, 7),
                'starting'   => '13:30',
                'ending'     => '15:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '3',
                'day_id'     => rand(1, 7),
                'starting'   => '10:00',
                'ending'     => '11:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '4',
                'day_id'     => rand(1, 7),
                'starting'   => '10:00',
                'ending'     => '11:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '5',
                'day_id'     => rand(1, 7),
                'starting'   => '10:00',
                'ending'     => '11:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '6',
                'day_id'     => rand(1, 7),
                'starting'   => '10:00',
                'ending'     => '11:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '7',
                'day_id'     => rand(1, 7),
                'starting'   => '10:00',
                'ending'     => '11:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
        for ($i = 0; $i < 7; $i++) {
            DB::table('schedules')->insert([
                'doctor_id'  => '8',
                'day_id'     => rand(1, 7),
                'starting'   => '10:00',
                'ending'     => '11:30',
                'quantity'   => '20',
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
    }
}
