<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeRollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee_rolls')->insert([
            'name'        => 'Admin',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('employee_rolls')->insert([
            'name'        => 'Accountant',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('employee_rolls')->insert([
            'name'        => 'Nurse',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('employee_rolls')->insert([
            'name'        => 'Laboratorian',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('employee_rolls')->insert([
            'name'        => 'Pharmacist',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('employee_rolls')->insert([
            'name'        => 'Receptionist',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('employee_rolls')->insert([
            'name'        => 'Representative',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('employee_rolls')->insert([
            'name'        => 'Case Manager',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis',
            'status'      => '1',
            'created_by'  => '1',
        ]);
    }
}
