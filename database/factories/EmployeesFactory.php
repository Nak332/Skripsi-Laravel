<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use App\Models\Employees;
use App\Models\Medicine;
use App\Models\RekamMedis;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
class EmployeesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $job = $this->faker->randomElement(['Perawat','Doktor']);
        $gender = 'binary';
        return [
            'employeeName' => $name,
            'employeeJob' => $job,
            'employeeGender' => $gender,
            'employeePhone' => $this->faker->phoneNumber(),
            'employeeNIK' => $this->faker->randomNumber(9, true)
            //
        ];
    }
}
