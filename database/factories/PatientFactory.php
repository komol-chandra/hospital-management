<?php

namespace Database\Factories;

use App\Models\Patient;
use Carbon\Carbon;
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
            'code'       => Str::random(6),
            'name'       => $this->faker->name,
            'email'      => $this->faker->email,
            'blood_id'   => $this->faker->numberBetween(1, 8),
            'address'    => $this->faker->address,
            'mobile'     => $this->faker->phoneNumber,
            'phone'      => $this->faker->phoneNumber,
            'gender'     => $this->faker->numberBetween(1, 2),
            'status'     => '1',
            'created_by' => '1',
            'today_date' => Carbon::now()->format('y-m-d'),
        ];
    }
}
