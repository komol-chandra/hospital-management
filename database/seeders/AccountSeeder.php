<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('accounts')->insert([
                'name'        => Str::random(6),
                'description' => Str::random(20),
                'type_id'     => '1',
                'status'      => '1',
                'created_by'  => '1',
            ]);
        }
        for ($i = 0; $i < 5; $i++) {
            DB::table('accounts')->insert([
                'name'        => Str::random(6),
                'description' => Str::random(20),
                'type_id'     => '2',
                'status'      => '1',
                'created_by'  => '1',
            ]);
        }
    }
}
