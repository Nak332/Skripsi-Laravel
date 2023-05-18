<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use App\Models\Employees;
use App\Models\Medicine;
use App\Models\Appointment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RekamMedis>
 */
class RekamMedisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $typeApp = $this->faker->randomElement(['Kunjungan','Rujukan','Booking']);
        return [
            'patient_id' => Patient::factory(),
            'employee_id' => Employees::factory(),
            'appointment_id' => Appointment::factory(),
            'medicine_id' => Medicine::factory(),
            'extramedicine_id' => Medicine::factory(),
            'symptoms' => $this->faker->sentence(3),
            'keluhan' => $this->faker->sentence(3),
            'penatalaksanaan' => $this->faker->sentence(3),
            'odontogram_klinik'=> $this->faker->sentence(3),
            'tindakan'=> $this->faker->sentence(3),
            'layanan_sebelumnya'=> $this->faker->sentence(3),
            'persetujuan'=> $this->faker->sentence(3),
            'disease' => $this->faker->sentence(3),
            'total_price' => $this->faker->numberBetween(5000, 10000000),
            'type' =>  $typeApp,
            'note' => $this->faker->paragraph(),
            'flag' => $this->faker->numberBetween(0,1),
            'icd10' => $this->faker->sentence()
            //
        ];
    }
}
