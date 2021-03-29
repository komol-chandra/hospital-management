<?php

namespace Database\Factories;

use App\Models\FrontendUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientFactory extends Factory
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
            'name'      => $this->faker->unique()->name,
            'full_name' => $this->faker->name,
            'email'     => $this->faker->unique()->email,
            'password'  => Hash::make('12345678'),
            'birthday'  => $this->faker->date,
            'blood_id'  => $this->faker->numberBetween(1, 8),
            'address'   => $this->faker->address,
            'mobile'    => $this->faker->unique()->phoneNumber,
            'gender'    => $this->faker->numberBetween(1, 2),
            'type'      => 'patient',
        ];
    }
}
