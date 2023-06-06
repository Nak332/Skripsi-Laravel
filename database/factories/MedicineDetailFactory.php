<?php

namespace Database\Factories;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicineDetail>
 */
class MedicineDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'medicine_id' => Medicine::factory(),
            'medicine_stock' => $this->faker->numberBetween(0,100),
            'medicine_expired_date' => $this->faker->dateTimebetween('+1 week','+10 years'),

            //
        ];
    }
}
