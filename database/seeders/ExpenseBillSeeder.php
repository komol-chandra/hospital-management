<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExpenseBillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ExpenseBill::factory(500)->create();

    }
}
