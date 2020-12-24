<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicine_types')->insert([
            'name'        => 'Liquid',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('medicine_types')->insert([
            'name'        => 'Tablet',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('medicine_types')->insert([
            'name'        => 'Capsules',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('medicine_types')->insert([
            'name'        => 'Inhalers',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('medicine_types')->insert([
            'name'        => 'Injections',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
        DB::table('medicine_types')->insert([
            'name'        => 'Drops',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, fugit aut ex temporibus laboriosam tempora quidem repellendus ipsa reprehenderit atque nostrum odio corporis obcaecati quod quos quasi eveniet officia veritatis!',
            'status'      => '1',
            'created_by'  => '1',
        ]);
    }
}
