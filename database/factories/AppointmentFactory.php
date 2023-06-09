<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Patient;
use App\Models\Employees;
use App\Models\Medicine;
use App\Models\RekamMedis;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $number = 1;
    public function definition()
    {
        $status = $this->faker->randomElement(['P','V','I']);
        $typeApp = $this->faker->randomElement(['Kunjungan','Rujukan','Booking']);
        return [
            'patient_id' => Patient::factory(),
            'employee_id' => Employees::factory(),
            'status' => $status,
            'complaint' => $this->faker->sentence(),
            'appointment_date' => $this->faker->dateTimeThisDecade(),
            'appointment_type' => $typeApp,
            'antrian_number' => self::$number++

        ];
    }
}
