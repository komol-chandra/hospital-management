<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generics')->insert([
            'name'        => 'PLENAXIS',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('generics')->insert([
            'name'        => 'ORENCIA ',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('generics')->insert([
            'name'        => 'ZIAGEN',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('generics')->insert([
            'name'        => 'YONSA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('generics')->insert([
            'name'        => 'GELFOAM DENTAL SPONGE',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('generics')->insert([
            'name'        => 'ACTIQ',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
    }
}
