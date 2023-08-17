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
        $gender = 'Pria';
        return [
            'employee_name' => $name,
            'employee_job' => $job,
            'employee_gender' => $gender,
            'employee_phone' => $this->faker->phoneNumber(),
            'employee_NIK' => $this->faker->randomNumber(9, true),
            'employee_address' => $this->faker->address(),
            'employee_photo' => $this->faker->imageUrl(640, 480, 'animals', true),
            'employee_DOB' =>$this->faker->dateTimeThisDecade(),
            'employee_POB'=> $this->faker->address(),
            'employee_email' => $this->faker->email(),
            'status' => $this->faker->numberBetween('0','1')
            //
        ];
    }
}
