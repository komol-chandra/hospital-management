<?php

namespace Database\Seeders;

use App\Models\FrontendUser;
use Illuminate\Database\Seeder;

class FrontendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FrontendUser::factory(600)->create();
    }
}
