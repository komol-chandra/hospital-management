<?php

namespace Database\Seeders;

use App\Models\FrontendUser;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        FrontendUser::factory(200)->create();

    }
}
