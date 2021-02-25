<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'                     => 'Super Admin',
            'full_name'                => 'admin',
            'email'                    => 'super.admin@example.com',
            'mobile'                   => '01811111111',
            'blood_id'                 => 1,
            'password'                 => Hash::make('super.admin@example.com'),
            'type'                     => 'Super Admin',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Admin',
            'full_name'                => 'admin',
            'email'                    => 'admin@example.com',
            'mobile'                   => '01811111112',
            'blood_id'                 => 1,
            'password'                 => Hash::make('admin@example.com'),
            'type'                     => 'Admin',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Writer',
            'full_name'                => 'Writer',
            'email'                    => 'writer@example.com',
            'mobile'                   => '01811111113',
            'blood_id'                 => 1,
            'password'                 => Hash::make('writer@example.com'),
            'type'                     => 'Writer',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Accountant',
            'full_name'                => 'Accountant',
            'email'                    => 'accountant@example.com',
            'mobile'                   => '01811111114',
            'blood_id'                 => 1,
            'password'                 => Hash::make('accountant@example.com'),
            'type'                     => 'Accountant',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Nurse',
            'full_name'                => 'Nurse',
            'email'                    => 'nurse@example.com',
            'mobile'                   => '01811111115',
            'blood_id'                 => 1,
            'password'                 => Hash::make('nurse@example.com'),
            'type'                     => 'Nurse',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Laboratorian',
            'full_name'                => 'Laboratorian',
            'email'                    => 'laboratorian@example.com',
            'mobile'                   => '01811111116',
            'blood_id'                 => 1,
            'password'                 => Hash::make('laboratorian@example.com'),
            'type'                     => 'Laboratorian',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Pharmacist',
            'full_name'                => 'Pharmacist',
            'email'                    => 'pharmacist@example.com',
            'mobile'                   => '01811111117',
            'blood_id'                 => 1,
            'password'                 => Hash::make('pharmacist@example.com'),
            'type'                     => 'Pharmacist',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Receptionist',
            'full_name'                => 'Receptionist',
            'email'                    => 'receptionist@example.com',
            'mobile'                   => '01811111118',
            'blood_id'                 => 1,
            'password'                 => Hash::make('receptionist@example.com'),
            'type'                     => 'Receptionist',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
        DB::table('users')->insert([
            'name'                     => 'Representative',
            'full_name'                => 'Representative',
            'email'                    => 'representative@example.com',
            'mobile'                   => '01811111119',
            'blood_id'                 => 1,
            'password'                 => Hash::make('representative@example.com'),
            'type'                     => 'Representative',
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
    }
}
