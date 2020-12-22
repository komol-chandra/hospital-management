<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name'       => 'Anesthetics',
            'created_by' => '1',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Cardiology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Neurology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Oncology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Ophthalmology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Urology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Breast Screening',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Gastroenterology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Hematology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Oncology',
        ]);
        DB::table('departments')->insert([
            'created_by' => '1',
            'name'       => 'Physiotherapy',
        ]);
    }
}
