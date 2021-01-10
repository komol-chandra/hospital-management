<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('services')->insert([
                'name'        => Str::random(10),
                'description' => Str::random(50),
                'quantity'    => rand(1, 3),
                'rate'        => rand(2000, 20000),
                'status'      => '1',
                'created_by'  => '1',
            ]);
        }
    }
}
