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
            'medicineName' => $name,
            'medicineStock' => $this->faker->numberBetween(0,100),
            'medicineExpiredDate' => $this->faker->dateTimebetween('+1 week','+10 years'),
            'medicineDescription' => $this->faker->sentence(),
            'medicinePrice' => $this->faker->numberBetween('5000','150000')
        ];
    }
}
