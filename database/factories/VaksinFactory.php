<?php

namespace Database\Factories;

use App\Models\Employees;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaksin>
 */
class VaksinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_id' => Employees::factory(),
            'vaccine_name' => $this->faker->name(),
            'patient_id' => Patient::factory(),
            'vaccination_date' => $this->faker->dateTimeThisDecade(),
            'batch_number' => $this->faker->randomNumber(1, true),
            'flag' => $this->faker->numberBetween(0,1),
            'notes' => $this->faker->sentence(3),
            'next_dose' => $this->faker->dateTimeThisDecade(),
            'penyakit' => $this->faker->sentence(3),
            'register_number' => $this->faker->numberBetween(0,99999),
            'supplier' => $this->faker->sentence(3),
            'expired_date' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
