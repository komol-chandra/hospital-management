<?php

namespace Database\Factories;

use App\Models\ExpenseBill;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseBillFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExpenseBill::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expense_id' => $this->faker->numberBetween(1, 2),
            'amount'     => $this->faker->numberBetween(100, 1000),
            'details'    => $this->faker->text,
            'date'       => Carbon::now(),
            'status'     => '1',
        ];
    }
}
