<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Str;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('payment_methods')->insert([
                'name'        => Str::random(10),
                'description' => Str::random(50),
                'status'      => '1',
                'created_by'  => '1',
            ]);
        }
    }
}
