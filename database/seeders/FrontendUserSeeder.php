<?php

namespace Database\Seeders;

use App\Models\FrontendUser;
use Illuminate\Database\Seeder;

class FrontendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('frontend_users')->insert([
        //     'name'                     => 'komol',
        //     'full_name'                => 'komol',
        //     'email'                    => 'komol@example.com',
        //     'mobile'                   => '01874303467',
        //     'blood_id'                 => 1,
        //     'password'                 => Hash::make('komol@example.com'),
        //     'type'                     => "patient",
        //     'parentId'                 => 1,
        //     'email_verified'           => 1,
        //     'email_verified_at'        => \Carbon\Carbon::now(),
        //     'email_verification_token' => '',
        // ]);
        FrontendUser::factory(600)->create();

    }
}
