<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

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
            'birthday'  => $this->faker->date,
            'blood_id'  => $this->faker->numberBetween(1, 8),
            'address'   => $this->faker->address,
            'mobile'    => $this->faker->phoneNumber,
            'gender'    => $this->faker->numberBetween(1, 2),
            'type'      => 'patient',
        ];
    }
}
