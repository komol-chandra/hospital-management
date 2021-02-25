<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'       => "Super Admin",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Admin",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Writer",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Accountant",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Nurse",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Laboratorian",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Pharmacist",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Receptionist",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Representative",
            'guard_name' => "web",
        ]);
        DB::table('roles')->insert([
            'name'       => "Case Manager",
            'guard_name' => "web",
        ]);
    }
}
