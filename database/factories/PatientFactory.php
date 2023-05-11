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
            'patient_name'=>$name,
            'patient_gender'=> $gender,
            'patient_alias' => $alias,
            'patient_phone'=> $this->faker->phoneNumber(),
            'patient_address'=>$this->faker->address(),
            'patient_NIK' => $this->faker->randomNumber(9, true),
            'patient_POB' => $this->faker->address(),
            'patient_DOB' => $this->faker->dateTimeThisDecade(),
            'patient_emergency_contact_name' => $this->faker->name(),
            'patient_emergency_contact_phone' => $this->faker->phoneNumber(),
            'has_BPJS' => $this->faker->numberBetween(0,1),
            'patient_marital_status' => $marital



            //
        ];
    }
}
