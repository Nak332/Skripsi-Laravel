<?php

namespace App\Listeners;

use App\Events\AppointmentHistoryCreated;
use App\Models\AppointmentHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class AppointmentToHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AppointmentHistoryCreated  $event
     * @return void
     */
    public function handle(AppointmentHistoryCreated $event)
    {
        Log::info('jalan');
        $appointment = $event->antri;
        $antrian = new AppointmentHistory();
        $antrian->appointment_id = $appointment->id;
        Log::info('ini buat namabha history' . $antrian->appointment_id);
        $antrian->patient_id = $appointment->patient_id;
        $antrian->employee_id = $appointment->employee_id;
        $antrian->appointment_type = $appointment->appointment_type;
        $antrian->antrian_number = $appointment->antrian_number;
        $antrian->complaint = $appointment->complaint;
        $antrian->status = $appointment->status;
        $antrian->appointment_date = $appointment->appointment_date;
        $antrian->save();
    }
}
