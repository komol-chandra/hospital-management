<?php

namespace Database\Factories;

use App\Models\FrontendUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class FrontendUserFactory extends Factory
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
            'name'      => $this->faker->name,
            'full_name' => $this->faker->name,
            'email'     => $this->faker->email,
            'password'  => '12345678',
            'mobile'    => $this->faker->phoneNumber,
            'birthday'  => $this->faker->date,
            'blood_id'  => $this->faker->numberBetween(1, 2),
            'gender'    => $this->faker->numberBetween(1, 2),
            'address'   => $this->faker->address,
        ];
    }
}
