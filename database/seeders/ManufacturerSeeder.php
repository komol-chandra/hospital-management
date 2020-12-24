<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('manufacturers')->insert([
                'name'       => Str::random(10),
                'mobile'     => rand(11, 12),
                'email'      => Str::random(10) . '@gmail.com',
                'address'    => Str::random(20),
                'details'    => Str::random(20),
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
    }
}
