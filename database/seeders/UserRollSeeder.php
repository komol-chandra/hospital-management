<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_rolls')->insert([
            'name'       => 'Admin',
            'slug'       => 'admin',
            'created_by' => '1',
        ]);
        DB::table('user_rolls')->insert([
            'name'       => 'Doctor',
            'slug'       => 'doctor',
            'created_by' => '1',
        ]);

        DB::table('user_rolls')->insert([
            'name'       => 'Accountant',
            'slug'       => 'accountant',
            'created_by' => '1',
        ]);
        DB::table('user_rolls')->insert([
            'name'       => 'Nurse',
            'slug'       => 'nurse',
            'created_by' => '1',
        ]);
        DB::table('user_rolls')->insert([
            'name'       => 'Laboratorian',
            'slug'       => 'laboratorian',
            'created_by' => '1',
        ]);
        DB::table('user_rolls')->insert([
            'name'       => 'Pharmacist',
            'slug'       => 'pharmacist',
            'created_by' => '1',
        ]);
        DB::table('user_rolls')->insert([
            'name'       => 'Receptionist',
            'slug'       => 'receptionist',
            'created_by' => '1',
        ]);
        DB::table('user_rolls')->insert([
            'name'       => 'Representative',
            'slug'       => 'representative',
            'created_by' => '1',
        ]);

    }
}
