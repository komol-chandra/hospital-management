<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicine::factory(100)->create();
        // Medicine::factory()->create(100);
        // App\Models\Medicine::create()->factory(100);
    }
}
