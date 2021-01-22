<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    }
}
