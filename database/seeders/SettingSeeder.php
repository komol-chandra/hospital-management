<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title'       => 'Admin Hospital',
            'email'       => 'admin@example.com',
            'contact'     => '01234-567890',
            'address'     => 'House#25, 4th Floor, Mannan Plaza, Khilkhet, Dhaka-1229, Bangladesh.',
            'facebook'    => 'https://www.facebook.com/',
            'linkedin'    => 'https://www.linkedin.com/',
            'twitter'     => 'https://www.twitter.com/',
            'google'      => 'https://www.google.com/',
            'youtube'     => 'https://www.youtube.com/',
            'instagram'   => 'https://www.instagram.com/',
            'footer_text' => 'AdminHospital',
            'footer_year' => '2020',
        ]);
    }
}
