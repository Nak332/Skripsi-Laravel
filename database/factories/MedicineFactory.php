<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        return [
            'medicine_name' => $name,
            'medicine_stock' => $this->faker->numberBetween(0,100),
            'medicine_expired_date' => $this->faker->dateTimebetween('+1 week','+10 years'),
            'medicine_description' => $this->faker->sentence(),
            'medicine_price' => $this->faker->numberBetween('5000','150000')
        ];
    }
}
