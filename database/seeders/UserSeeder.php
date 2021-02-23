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
            'name'                     => 'admin',
            'full_name'                => 'admin',
            'email'                    => 'admin@example.com',
            'mobile'                   => '01*********',
            'blood_id'                 => 1,
            'password'                 => Hash::make('admin@example.com'),
            'type'                     => 1,
            'parentId'                 => 1,
            'email_verified'           => 1,
            'email_verified_at'        => \Carbon\Carbon::now(),
            'email_verification_token' => '',
        ]);
    }
}
