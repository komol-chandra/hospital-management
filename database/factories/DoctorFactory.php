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
            'full_name'     => $this->faker->name,
            'department_id' => $this->faker->numberBetween(1, 10),
            'phone'         => $this->faker->phoneNumber,
            'address'       => $this->faker->address,
            'biography'     => $this->faker->text,
            'specialist'    => $this->faker->sentence,
            'education'     => $this->faker->text,
            'feeNew'        => '500',
            'feeInMonth'    => '300',
            'feeReport'     => '200',
            'feeReport'     => '20,000',
            'status'        => '1',

        ];
    }
}
