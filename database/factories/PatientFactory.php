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
        $gender = 'binary';

        return [
            'name'=>$name,
            'gender'=> $gender,
            'phone'=> $this->faker->phoneNumber(),
            'address'=>$this->faker->address()


            //
        ];
    }
}
