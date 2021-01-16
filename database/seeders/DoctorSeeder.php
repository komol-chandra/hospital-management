<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // foreach (range(1, 100) as $index) {
        //     DB::table('users')->insert([
        //         'name'          => $faker->name,
        //         'email'         => $faker->email,
        //         'designation'   => $faker->designation,
        //         'address'       => $faker->address,
        //         'phone'         => $faker->phone,
        //         'biography'     => $faker->biography,
        //         'specialist'    => $faker->specialist,
        //         'birthday'      => $faker->birthday,
        //         'education'     => $faker->education,
        //         'mobile'        => $faker->mobile,
        //         'department_id' => '1',
        //         'user_id' => factory(App\User::class),
        //         'gender'        => '1',
        //         'blood_id'      => '1',
        //         'status'        => '1',
        //         'created_by'    => '1',
        //     ]);
        // }

        for ($i = 0; $i < 8; $i++) {
            DB::table('doctors')->insert([
                'name'          => Str::random(10),
                'email'         => Str::random(10) . '@gmail.com',
                'designation'   => Str::random(50),
                'address'       => Str::random(50),
                'biography'     => Str::random(50),
                'specialist'    => Str::random(50),
                'education'     => Str::random(50),
                // 'birthday'      => rand(strtotime("Jan 01 2015"), strtotime("Nov 01 2016")),
                'department_id' => rand(1, 5),
                'mobile'        => (+880) . rand(1800000000, 1899999999),
                'phone'         => rand(1000000, 2000000),
                'gender'        => rand(1, 2),
                'status'        => '1',
                'created_by'    => '1',
            ]);
        }
    }
}
