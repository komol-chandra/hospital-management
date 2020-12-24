<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('medicines')->insert([
                'name'       => Str::random(10),
                'type_id'    => '1',
                'generic_id' => '1',
                // 'manufacturer_id' => '1',
                'price'      => rand(2, 3),
                'tax'        => rand(1, 2),
                'details'    => Str::random(100),
                'status'     => '1',
                'created_by' => '1',
            ]);
        }
    }
}
