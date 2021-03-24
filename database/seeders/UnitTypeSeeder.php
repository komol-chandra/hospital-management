<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_types')->insert([
            'name'       => 'Gram',
            'status'     => '1',
            'created_by' => '1',
        ]);
        DB::table('unit_types')->insert([
            'name'       => 'Liter',
            'status'     => '1',
            'created_by' => '1',
        ]);
        DB::table('unit_types')->insert([
            'name'       => 'Box',
            'status'     => '1',
            'created_by' => '1',
        ]);
    }
}
