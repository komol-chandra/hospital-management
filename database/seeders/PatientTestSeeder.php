<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class PatientTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patient_tests')->insert([
            'test_id'    => '1',
            'doctor_id'  => '1',
            'patient_id' => '1',
            'details'    => Str::random(10),
            'created_by' => '1',
        ]);
        DB::table('patient_tests')->insert([
            'test_id'    => '2',
            'doctor_id'  => '2',
            'patient_id' => '2',
            'details'    => Str::random(10),
            'created_by' => '1',
        ]);
        DB::table('patient_tests')->insert([
            'test_id'    => '3',
            'doctor_id'  => '3',
            'patient_id' => '3',
            'details'    => Str::random(10),
            'created_by' => '1',
        ]);
        DB::table('patient_tests')->insert([
            'test_id'    => '4',
            'doctor_id'  => '4',
            'patient_id' => '4',
            'details'    => Str::random(10),
            'created_by' => '1',
        ]);
        DB::table('patient_tests')->insert([
            'test_id'    => '5',
            'doctor_id'  => '5',
            'patient_id' => '5',
            'details'    => Str::random(10),
            'created_by' => '1',
        ]);
    }
}
