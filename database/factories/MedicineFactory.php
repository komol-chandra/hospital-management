<?php

namespace Database\Factories;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'               => $this->faker->word,
            'type_id'            => $this->faker->numberBetween(1, 3),
            'generic_id'         => $this->faker->numberBetween(1, 3),
            'manufacturer_id'    => $this->faker->numberBetween(1, 3),
            'price'              => $this->faker->numberBetween($min = 10, $max = 900),
            'tax'                => $this->faker->numberBetween($min = 10, $max = 100),
            'details'            => $this->faker->text,
            'dosage'             => $this->faker->text,
            'vat'                => $this->faker->numberBetween($min = 10, $max = 100),
            'unit_type_id'       => $this->faker->numberBetween($min = 1, $max = 3),
            'single_unit_weight' => $this->faker->text,
            'box_weight'         => $this->faker->text,
            'minimum_unit'       => $this->faker->text,
            'unit_location'      => $this->faker->text,
            'status'             => '1',
            'created_by'         => '1',
        ];
    }
}
