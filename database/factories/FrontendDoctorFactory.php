<?php

namespace Database\Factories;

use App\Models\FrontendUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class FrontendDoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FrontendUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'genre_id' => function () {
            //     $this App\Models\Doctor::inRandomOrder()->first()->id;
            // },

            'parentId'   => factory('App\Models\Doctor')->create()->id,
            'name'       => $this->faker->name,
            'full_name'  => $this->faker->name,
            'email'      => $this->faker->unique()->email,
            'password'   => Hash::make('12345678'),
            'mobile'     => $this->faker->unique()->phoneNumber,
            'birthday'   => $this->faker->date,
            'gender'     => $this->faker->numberBetween(1, 2),
            'created_by' => '1',
            'type'       => 'doctor',
        ];
    }
}
