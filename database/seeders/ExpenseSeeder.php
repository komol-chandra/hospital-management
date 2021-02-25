<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'name' => 'Daily Expense',
        ]);
        DB::table('expenses')->insert([
            'name' => 'Maintenance',
        ]);
    }
}
