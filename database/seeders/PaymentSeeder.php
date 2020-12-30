<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('payments')->insert([
                'name'        => Str::random(10),
                'account_id'  => '1',
                'pay_to'      => Str::random(5),
                'description' => Str::random(10),
                'status'      => '1',
                'created_by'  => '1',
            ]);
        }
    }
}
