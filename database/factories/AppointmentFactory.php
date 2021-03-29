<?php

namespace Database\Factories;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type'           => '1',
            'patient_id'     => $this->faker->numberBetween(1, 100),
            'department_id'  => $this->faker->numberBetween(1, 2),
            'doctor_id'      => $this->faker->numberBetween(1, 2),
            'date'           => Carbon::now()->format('Y-m-d'),
            'payment_amount' => '500',
            'status'         => '1',
            'created_by'     => '1',

        ];
    }
}
