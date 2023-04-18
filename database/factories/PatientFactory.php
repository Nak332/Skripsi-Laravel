<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $alias = $this->faker->name();
        $marital = $this->faker->randomElement(['Kawin','Belum Kawin','Cerai']);
        $gender = 'binary';

        return [
            'patientName'=>$name,
            'patientGender'=> $gender,
            'patientAlias' => $alias,
            'patientPhone'=> $this->faker->phoneNumber(),
            'patientAddress'=>$this->faker->address(),
            'patientNIK' => $this->faker->randomNumber(9, true),
            'patientPOB' => $this->faker->address(),
            'patientDOB' => $this->faker->dateTimeThisDecade(),
            'patientEmergencyContactName' => $this->faker->name(),
            'patientEmergencyContactPhone' => $this->faker->phoneNumber(),
            'hasBPJS' => $this->faker->numberBetween(0,1),
            'patientMaritalStatus' => $marital



            //
        ];
    }
}
