<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name,
            'email'         => $this->faker->email,
            'mobile'        => $this->faker->phoneNumber,
            'birthday'      => $this->faker->date,
            'department_id' => $this->faker->numberBetween(1, 10),
            'phone'         => $this->faker->phoneNumber,
            'address'       => $this->faker->address,
            'biography'     => $this->faker->text,
            'specialist'    => $this->faker->sentence,
            'education'     => $this->faker->text,
            'gender'        => $this->faker->numberBetween(1, 2),
            'status'        => '1',
            'created_by'    => '1',
        ];
    }
}
