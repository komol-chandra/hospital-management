<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('new_appointments')->insert([
                'patient_id'       => rand(1, 12),
                'name'       => Str::random(10),
                'email'      => Str::random(10) . '@gmail.com',
                'date'    => '01-01-2021',
                'mobile'     => rand(11, 12),
                'department_id'      => rand(1, 3),
                'doctor_id'     => rand(1, 3),
            ]);
        }
}
