<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Patient::factory()
            ->count(5)
            ->hasAppointments(3)
            ->create();

            Patient::factory()
            ->count(5)
            ->hasRekamMedis(3)
            ->create();

            Patient::factory()
            ->count(10)
            ->hasAppointments(7)
            ->create();

            Patient::factory()
            ->count(5)
            ->hasAppointments(0)
            ->create();
    }
}
